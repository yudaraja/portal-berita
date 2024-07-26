@extends('layouts.portal-berita.index')
@section('title', 'Contact')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<div class="row">
    <div class="col-lg-4">
        <div class="pr-0 pr-lg-4">
            <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labor.
                <div class="mt-5">
                    <p class="h3 mb-3 font-weight-normal"><a class="text-dark"
                            href="mailto:hello@reporter.com">yuda@gmail.com</a>
                    </p>
                    <p class="mb-3"><a class="text-dark" href="tel:&#43;211234565523">&#43;62822514213</a>
                    </p>
                    <p class="mb-2">Balikpapan, Kalimantan Timur</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mt-4 mt-lg-0">
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="subject">Subjek</label>
                <input type="text" id="subject" name="subject" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Pesan</label>
                <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Feedback</button>
        </form>
    </div>
</div>
@endsection
