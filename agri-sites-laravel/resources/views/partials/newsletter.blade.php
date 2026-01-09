<div class="container content-section-9-main">
    <div class="row c-s-9-main">
        <div class="col-md-6 s-9-head-main">
            <h1 class="s-9-h-one">Subscribe to our Newsletter</h1>
        </div>
        <div class="col-md-6 s-9-itp-main">
            @if(session('newsletter_status'))
                <div class="alert alert-success mb-2">{{ session('newsletter_status') }}</div>
            @endif
            <form method="POST" action="{{ route('newsletter.subscribe') }}" class="input-group i-b-hendle">
                @csrf
                <input type="email" name="email" placeholder="Your Email Address" class="form-control f-hendle" required>
                <button type="submit" class="btn btn-lg s-9btn">Subscribe</button>
            </form>
        </div>
    </div>
</div>
