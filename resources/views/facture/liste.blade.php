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
                    <h6 class="mb-4">Listes des factures</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Numéro</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Montant</th>
                                    <th scope="col">Client</th>
                                     <th scope="col">Impression</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($facture as $fact)

                                    <tr>
                                        <th scope="row">{{$fact->id}}</th>
                                        <td>{{$fact->date}}</td>
                                        <td>{{$fact->montant}} Fcfa</td>
                                        <td>{{$fact->commande->client->nom}}</td>
                                        <td><a href="{{route('imprime.factures',['id'=>$fact->id])}}" class="btn btn-primary"><i class="bi bi-printer-fill"></i></a></td>

                                    </tr>
                                    @endforeach
                               
                            </tbody>
                        </table>
                        {{$facture->links()}}
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