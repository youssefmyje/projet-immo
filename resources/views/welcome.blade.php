<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Agence Immobilière</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .carousel-item img {
            width: 100%;
            height: 300px;
            /* Définissez la hauteur que vous souhaitez */
            object-fit: cover;
            /* Ajustez cette propriété selon vos besoins */
        }
    </style>
</head>

<body>
    <!-- Barre de navigation -->
    @include('partials.nav')

    <!-- Section de recherche -->
    <section class="search-section container mt-5">
        <h1 class="text-center mb-4 white-text">Recherche de biens immobiliers</h1>
        <form action="{{ url('/search') }}" method="GET" class="form-row justify-content-center">
            <div class="form-group col-md-12 text-center">
                <label for="transaction" class="mr-3">Transaction:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="buy" name="transaction" value="buy">
                    <label class="form-check-label" for="buy">Acheter</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="rent" name="transaction" value="rent">
                    <label class="form-check-label" for="rent">Louer</label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="location">Localisation:</label>
                <input type="text" id="location" name="location" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="budget_min">Budget Min:</label>
                <input type="number" id="budget_min" name="budget_min" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="budget_max">Budget Max:</label>
                <input type="number" id="budget_max" name="budget_max" class="form-control">
            </div>
            <div class="form-group col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary btn-block">Rechercher</button>
            </div>
        </form>
    </section>

    <!-- Affichage des annonces -->
    <section class="annonces-section container mt-5">
        <h2 class="text-center">Nos dernières annonces</h2>
        <div class="row">
            @foreach($annonces as $annonce)
            <div class="col-md-4">
                <div class="annonce card mb-4">
                    @if($annonce->photos)
                    @php
                    $photos = json_decode($annonce->photos);
                    @endphp
                    @if(is_array($photos) && count($photos) > 0)
                    <div id="carousel-{{$annonce->id}}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($photos as $index => $photo)
                            <div class="carousel-item @if($index == 0) active @endif">
                                <img src="{{ asset('photos/' . $photo) }}" class="d-block w-100" alt="Image de l'annonce">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-{{$annonce->id}}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-{{$annonce->id}}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    @endif
                    @else
                    <img src="{{ asset('photos/default.jpg') }}" alt="Image de l'annonce" class="d-block w-100" style="height: 300px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">{{ $annonce->titre }}</h3>
                        <p class="card-text">{{ $annonce->description }}</p>
                        <a href="{{ url('/listings/' . $annonce->id) }}" class="btn btn-link">Voir les détails</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Présentation de l'agence -->
    <section class="additional-section container mt-5">
        <h2 class="text-center">Présentation de l'agence</h2>
        <p class="text-center">Bienvenue à notre agence immobilière. Nous offrons les meilleurs services pour vous aider à trouver votre maison de rêve.</p>
        <p class="text-center mt-3">Depuis plus de 20 ans, notre agence s'est dédiée à offrir des services immobiliers de qualité supérieure. Que vous cherchiez à acheter, vendre ou louer un bien, notre équipe d'experts est là pour vous accompagner à chaque étape du processus.</p>
        <p class="text-center mt-3">Nous comprenons que trouver la maison parfaite peut être un défi, c'est pourquoi nous mettons un point d'honneur à écouter attentivement vos besoins et à vous proposer des solutions sur mesure. Grâce à notre connaissance approfondie du marché local et à notre réseau étendu, nous sommes en mesure de vous offrir les meilleures opportunités disponibles.</p>
        <p class="text-center mt-3">Notre mission est de rendre votre expérience immobilière aussi agréable et sans stress que possible. Nous nous engageons à fournir un service professionnel, transparent et réactif. Faites confiance à notre équipe pour réaliser vos rêves immobiliers.</p>
        <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/photo1.jpg') }}" class="d-block w-100" alt="Photo 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/photo2.jpg') }}" class="d-block w-100" alt="Photo 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/photo3.jpg') }}" class="d-block w-100" alt="Photo 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <!-- Nos services -->
    <section class="additional-section container mt-5">
        <h2 class="text-center mb-4">Nos services</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="my-4">
                            <i class="fas fa-home fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title">Achat de biens immobiliers</h5>
                        <p class="card-text">Nous vous accompagnons dans l'achat de votre bien immobilier, en vous proposant les meilleures offres du marché.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="my-4">
                            <i class="fas fa-key fa-3x text-success"></i>
                        </div>
                        <h5 class="card-title">Location de biens immobiliers</h5>
                        <p class="card-text">Découvrez notre large sélection de biens à louer pour répondre à tous vos besoins.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="my-4">
                            <i class="fas fa-tools fa-3x text-warning"></i>
                        </div>
                        <h5 class="card-title">Gestion de propriétés</h5>
                        <p class="card-text">Confiez-nous la gestion de vos propriétés pour une tranquillité d'esprit et une valorisation optimale de vos biens.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="additional-section container mt-5 mb-5">
        <h2 class="text-center mb-4">Témoignages</h2>
        <div class="row">
            <!-- Formulaire de saisie de commentaires -->
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0 testimonial-form">
                    <div class="card-body">
                        <h5 class="card-title">Laissez votre commentaire</h5>
                        <form id="testimonial-form" action="{{ url('/testimonials') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="comment">Votre témoignage:</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Votre nom:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Affichage des témoignages existants -->
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="overflow-auto" style="max-height: 500px;">
                            <div class="accordion" id="testimonialsAccordion">
                                @foreach($testimonials as $testimonial)
                                <div class="card">
                                    <div class="card-header" id="heading{{ $testimonial->id }}">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $testimonial->id }}" aria-expanded="true" aria-controls="collapse{{ $testimonial->id }}">
                                                "{{ $testimonial->comment }}"
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapse{{ $testimonial->id }}" class="collapse" aria-labelledby="heading{{ $testimonial->id }}" data-parent="#testimonialsAccordion">
                                        <div class="card-body">
                                            <strong>Auteur: </strong>{{ $testimonial->name }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-4">
                    <h5>Contactez-nous</h5>
                    <p>contact@agence-immobiliere.fr</p>
                    <p>01 23 45 67 89</p>
                </div>
                <!-- Address -->
                <div class="col-md-4">
                    <h5>Adresse</h5>
                    <p>123 Rue de l'Immobilier</p>
                    <p>75000 Paris, France</p>
                </div>
                <!-- Social Media Links -->
                <div class="col-md-4">
                    <h5>Suivez-nous</h5>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <p>&copy; 2024 Agence Immobilière. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('testimonial-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Empêche le rechargement de la page
            const form = event.target;
            const formData = new FormData(form);

            fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Créer un nouvel élément de témoignage
                        const testimonialList = document.getElementById('testimonialsAccordion');
                        const newTestimonialId = heading$ {
                            data.testimonial.id
                        };
                        const newTestimonialCollapseId = collapse$ {
                            data.testimonial.id
                        };
                        const newTestimonial = document.createElement('div');
                        newTestimonial.classList.add('card');
                        newTestimonial.innerHTML = `
                <div class="card-header" id="${newTestimonialId}">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#${newTestimonialCollapseId}" aria-expanded="true" aria-controls="${newTestimonialCollapseId}">
                            "${data.testimonial.comment}"
                        </button>
                    </h2>
                </div>
                <div id="${newTestimonialCollapseId}" class="collapse" aria-labelledby="${newTestimonialId}" data-parent="#testimonialsAccordion">
                    <div class="card-body">
                        <strong>Auteur: </strong>${data.testimonial.name}
                    </div>
                </div>
            `;
                        testimonialList.prepend(newTestimonial); // Ajoute le nouveau témoignage au début de la liste

                        // Réinitialise le formulaire
                        form.reset();
                    } else {
                        alert('Une erreur s\'est produite lors de l\'envoi du témoignage.');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Une erreur s\'est produite lors de l\'envoi du témoignage.');
                });
        });
    </script>
</body>

</html>