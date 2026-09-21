<?php

namespace App\Controllers;

use App\Models\BookModel;

class KatalogController extends BaseController
{
    // Katalog publik (boleh tanpa login)
    public function index()
    {
        $bookModel = new BookModel();
        $q = trim((string) $this->request->getGet('q'));

        if ($q !== '') {
            $bookModel->groupStart()
                ->like('title_book', $q)
                ->orLike('author_book', $q)
                ->orLike('subjek', $q)
                ->groupEnd();
        }

        $data = [
            'title' => 'Katalog Buku — LIBRIS',
            'books' => $bookModel->orderBy('title_book', 'ASC')->findAll(),
            'q'     => $q,
        ];
        return view('katalog/index', $data);
    }

    // Detail buku (boleh tanpa login; aksi baca/pinjam/wishlist butuh login)
    public function detail($id = null)
    {
        $bookModel = new BookModel();
        $book = $bookModel->find($id);

        if (! $book) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku tidak ditemukan');
        }

        $inWishlist = false;
        if (session('isLoggedIn') && session('role') === 'user') {
            $inWishlist = (new \App\Models\WishlistModel())
                ->where('id_user', session('id_user'))
                ->where('id_book', $id)
                ->countAllResults() > 0;
        }

        // ── Ulasan (untuk tab ULASAN) ──
        $reviews = (new \App\Models\BookReviewModel())
            ->select('book_reviews.*, users.name AS user_name')
            ->join('users', 'users.id_user = book_reviews.id_user', 'left')
            ->where('book_reviews.id_book', $id)
            ->orderBy('book_reviews.updated_at', 'DESC')
            ->findAll();
        $count = count($reviews);
        $avg   = $count ? array_sum(array_column($reviews, 'rating')) / $count : 0;
        $myReview = null;
        if (session('isLoggedIn')) {
            foreach ($reviews as $r) {
                if ((int) $r['id_user'] === (int) session('id_user')) { $myReview = $r; break; }
            }
        }

        // ── Rekomendasi (subjek mirip, lalu dilengkapi buku lain) ──
        $rekom  = [];
        $subjek = trim((string) ($book['subjek'] ?? ''));
        if ($subjek !== '') {
            $first = trim(explode(',', $subjek)[0]);
            $rekom = $bookModel->where('id_book !=', $id)->like('subjek', $first)
                ->orderBy('title_book', 'ASC')->findAll(4);
        }
        if (count($rekom) < 4) {
            $exclude = array_merge([$id], array_column($rekom, 'id_book'));
            $more = (new BookModel())->whereNotIn('id_book', $exclude)
                ->orderBy('id_book', 'DESC')->findAll(4 - count($rekom));
            $rekom = array_merge($rekom, $more);
        }

        return view('katalog/detail', [
            'title'      => $book['title_book'] . ' — LIBRIS',
            'book'       => $book,
            'inWishlist' => $inWishlist,
            'reviews'    => $reviews,
            'avg'        => $avg,
            'count'      => $count,
            'myReview'   => $myReview,
            'rekom'      => $rekom,
        ]);
    }
}
