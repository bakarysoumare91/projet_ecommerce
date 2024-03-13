<!-- partie liste -->
<!DOCTYPE html>
<html lang="en">

@include('partials.header')

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('partials.sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('partials.navbar')
            <!-- Navbar End -->

            <!-- Sale & Revenue Start -->
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Responsive Table</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Numero</th>
                                    <th scope="col">Categorie</th>
                                    <th scope="col">Date de creation</th>
                                    <th scope="col">Date de mise a jour</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                 
                                    <tr>
                                        <td>{{ $cate->id}}</td>
                                        <td>{{ $cate->categorie}}</td>
                                        <td>{{ $cate->created_at}}</td>
                                        <td>{{ $cate->updated_at}}</td>

                                
                                    </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                             <!-- partie detaille  -->      
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Modifier fourniseur
                </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                <form action="{{ route('update.categorie') }}" method="POST" class="form-group" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="categorie" class="form-label">categorie</label>
                    <input type="text" class="form-control" id="categorie" name="categorie" placeholder="Votre nom" value="{{ $cate->categorie }}">
                </div>

                <input type="hidden" class="form-control" id="cate" name="id" value="{{ $cate->id }}">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
     </div>
    </div>

                
            @include('partials.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('partials.js')
</body>

</html>