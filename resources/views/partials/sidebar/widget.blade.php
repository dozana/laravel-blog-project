<div class="card mb-4">
    <div class="card-header">Side Widget</div>
    <div class="card-body">
        You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!

        <a href="tel:{{ $contact->phone }}">
            <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fas fa-phone fa-stack-1x fa-inverse"></i>
            </span>
        </a>

        <a href="mailto:{{ $contact->email }}">
            <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
            </span>
        </a>

    </div>
</div>
