<?php
// app/controllers/HomeController.php

class HomeController extends Controller {

    private Book        $bookModel;
    private Testimonial $testiModel;

    public function __construct() {
        $this->bookModel  = new Book();
        $this->testiModel = new Testimonial();
    }

    public function index(): void {
        $flash        = $this->getFlash();
        $books        = $this->bookModel->findAll();
        $bestsellers  = $this->bookModel->getBestsellers();
        $categories   = $this->bookModel->getCategories();
        $testimonials = $this->testiModel->findAll();
        $totalBooks   = $this->bookModel->count();

        $this->view('home/index', compact(
            'flash','books','bestsellers','categories','testimonials','totalBooks'
        ));
    }
}
