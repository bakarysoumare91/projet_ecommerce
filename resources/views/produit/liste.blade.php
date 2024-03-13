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
                                    <th scope="col">code</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">stock</th>
                                    <th scope="col">Fournisseur</th>
                                    <th scope="col">Categorie</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                   @foreach($produits as $prod)
                                    <tr>
                                        <th scope="row">{{$prod->id}}</th>
                                        <td>{{$prod->code}}</td>
                                        <td>{{$prod->designation}}</td>
                                        <td>{{$prod->prix}}</td>
                                        <td>{{$prod->stock}}</td>
                                        <td>{{$prod->fournisseur->nom}}</td>
                                        <td>{{$prod->categorie->categorie}}</td>

                                        <td><a href="{{route('details.produit',['id'=>$prod->id])}} " class="btn btn-dark"><i class="bi bi-eye-fill"></i></a></td>

                                        <td>Delete</td>
                                    </tr>
                                    @endforeach
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ajouter Produit
                </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                    <form action="{{route('ajouter.produit')}}" method="POST" class="form-group" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="designation" class="form-label">Code</label>
                            <input type="text" class="form-control" id="designation" value="P°{{$codeProduit}}"  disabled>
                            <input type="hidden" class="form-control" id="designation" value="P°{{$codeProduit}}" name="code" >

                            </div>
                            <div class="mb-3">
                            <label for="designation" class="form-label">designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" placeholder="veuillez mettre votre designation">
                            </div>

                            <div class="mb-3">
                                <label for="prix" class="form-label">prix</label>
                                <input type="number" min="1" class="form-control" id="prix" name="prix" placeholder="veuillez mettre votre prix">
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">stock</label>
                                <input type="number" min="1" class="form-control" id="stock" name="stock" placeholder="veuillez mettre votre stock">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">fournisseur</label>
                                <select name="fournisseur_id" id="" class="form-select">
                                    @foreach ($fournisseurAll as $user )
                                    <option value="{{$user->id}}">{{$user->nom}}</option>
                                    @endforeach
                                </select>
                               
                            </div>  

                            <div class="mb-3">
                                <label for="email" class="form-label">categorie</label>
                                <select name="categorie_id" id="" class="form-select">
                                @foreach ($categorieAll as $cat )
                                    <option value="{{$cat->id}}">{{$cat->categorie}}</option> <!-- ici c'est la jointure on le gere au niveau de model-->
                                    @endforeach
                                </select>
                               
                            </div>                            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                        </div>
                       
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