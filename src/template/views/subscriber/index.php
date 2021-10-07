<?php
require_once(ROOT.'/public/toolbar.php');
?>

<form action="#" method="post" class="text-center form-subscribe">
    <h1 class="h3 mb-3 font-weight-normal">Join our newsletter</h1>
    <label for="email_input" class="sr-only">Subscribe to our newsletter to receive latest news</label>
    <input
            name="email"
            type="email"
            id="email_input"
            class="form-control"
            placeholder="Enter your email"
            aria-label="Enter your email"
            required
            autofocus
    />
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="tos" />
            Accepts terms and condition
        </label>
    </div>
    <button
            class="btn btn-lg btn-primary btn-block"
            type="submit"
            name="submit"
            id="button-addon2">
        Submit
    </button>
</form>