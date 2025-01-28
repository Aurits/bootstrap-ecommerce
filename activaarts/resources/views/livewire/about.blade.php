<div>
    <main class="container py-5 mt-5">
        <section class="mb-5">
            <h1 class="text-center mb-4">About Activaarts</h1>
            <div class="minimalist-divider"></div>
            <div class="row">
                <div class="col-md-6">
                    <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('slider/slider-2.png') }}" class="d-block w-100 rounded"
                                    alt="About Activaarts">
                            </div>
                            <div class="carousel-item">
                                <div class="ratio ratio-16x9">
                                    <video autoplay loop muted playsinline>
                                        <source src="{{ asset('slider/slider-1.mp4') }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>

                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>
                        Activaarts is a premier online destination for art enthusiasts
                        and creators alike. We curate a diverse collection of unique
                        artworks and high-quality craft supplies, connecting talented
                        artists with passionate collectors and DIY enthusiasts.
                    </p>
                    <p>
                        Our mission is to inspire creativity and bring the joy of art into
                        everyday life. Whether you're looking for a statement piece for
                        your home or office, or seeking the perfect materials for your
                        next project, Activaarts is your trusted partner in the world of
                        art and crafts.
                    </p>
                    <p>
                        Founded in 2020, we've quickly grown to become a hub for artists,
                        collectors, and craft enthusiasts from around the globe. Our team
                        of expert curators handpicks each item in our collection, ensuring
                        that you have access to the finest art supplies and most
                        captivating artworks.
                    </p>
                </div>
            </div>
        </section>



        <!-- <section class="mb-5">
            <h2 class="text-center mb-4">Our Team</h2>
            <div class="minimalist-divider"></div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Team Member Name" />
                        <div class="card-body">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text">Founder & CEO</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Team Member Name" />
                        <div class="card-body">
                            <h5 class="card-title">Jane Smith</h5>
                            <p class="card-text">Art Curator</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Team Member Name" />
                        <div class="card-body">
                            <h5 class="card-title">Mike Johnson</h5>
                            <p class="card-text">Customer Experience Manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section id="contact">
            <h2 class="text-center mb-4">Contact Us</h2>
            <div class="minimalist-divider"></div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <form wire:submit.prevent="submit">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" wire:model="name" />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" wire:model="email" />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" wire:model="message"></textarea>
                            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-custom">Send Message</button>
                    </form>
                </div>
                <div class="col-md-6 mb-4">
                    <h4>Our Location</h4>
                    <p>Kampala (Uganda)</p>
                    <h4>Email</h4>
                    <p>activaartsug@gmail.com</p>
                    <h4>Phone</h4>
                    <p>(+256) 704416545/773559912</p>
                </div>
            </div>

            <!-- Success Popup -->
            @if ($showSuccess)
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                Your message has been sent successfully!
                <button type="button" class="btn-close" wire:click="$set('showSuccess', false)"
                    aria-label="Close"></button>
            </div>
            @endif
        </section>

    </main>
</div>