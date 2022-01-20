<template>
    <div class="container">
        <h1 class="text-white">Easy way to find the right car</h1>
        <form class="form-group d-block bg-opacity-50 justify-content-center"
              style=" background-color: rgba(34,30,50,0.5);">
            <div class="row g-0 ms-lg-n2" style="margin-top: 1em">
                <div class="col-lg-2">
                    <div class="input-group ">
                        <span class="input-group-text text-muted border-dark ps-2 ps-sm-3"
                              style="background-color:rgba(34,30,50,0.5); ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </span>
                        <input class="form-control border-dark" style="color: white;background-color: rgba(34,30,50,0.5);"
                               type="text" name="keywords" placeholder="Keywords...">
                    </div>
                </div>
                <hr class="hr-light d-lg-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown" data-bs-toggle="select">
                        <button class="btn btn-link text-white-50 dropdown-toggle ps-2 ps-sm-3" type="button"
                                data-bs-toggle="dropdown" style="text-decoration: none;" >
                            <i class="fi-list me-2"></i>
                            <span class="dropdown-toggle-label" >
                                Make
                            </span>
                        </button>
                        <input type="hidden" name="make">
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="dropdown-item-label">
                                        Acura
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="dropdown-item-label">
                                        BMW
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="dropdown-item-label">
                                        Citroen
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="dropdown-item-label">
                                        Lexus
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="dropdown-item-label">
                                        Mercedes-Benz
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="dropdown-item-label">
                                        Nissan
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="dropdown-item-label">
                                        Toyota
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="hr hr-light d-sm-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown" data-bs-toggle="select">
                        <button class="btn btn-link dropdown-toggle ps-2 text-white-50 ps-sm-3" type="button"
                                data-bs-toggle="dropdown" style="text-decoration: none">
                            <span class="dropdown-toggle-label" style="text-decoration: none">
                                Model
                            </span>
                        </button>
                        <input type="hidden" name="model">
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Altima</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Juke</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Leaf</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Maxima</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Micra</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Murano</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Note</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Patrol</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="hr-light d-md-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown" data-bs-toggle="select">
                        <button class="btn btn-link text-white-50 dropdown-toggle ps-2 ps-sm-3" type="button"
                                data-bs-toggle="dropdown" style="text-decoration: none">
                            <span class="dropdown-toggle-label" style="text-decoration: none">
                                Body type
                            </span>
                        </button>
                        <input type="hidden" name="type">
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Compact</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Crossover</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Coupe</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span
                                class="dropdown-item-label">Family MPV</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Pickup</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Sedan</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">SUV</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Wagon</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="hr-light d-sm-none my-2">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="dropdown" data-bs-toggle="select">
                        <button class="btn btn-link text-white-50 dropdown-toggle ps-2 ps-sm-3" type="button"
                                data-bs-toggle="dropdown" style="text-decoration: none">
                            <span class="dropdown-toggle-label" style="text-decoration: none">
                                Location
                            </span>
                        </button>
                        <input type="hidden" name="location">
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Dallas</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Chicago</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Houston</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">Las Vegas</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span
                                class="dropdown-item-label">Los Angeles</span></a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">New York</span></a>
                            </li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-item-label">San Francisco</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="hr-light d-lg-none my-2">
                <div class="col-lg-2">
                    <button class="btn w-100 text-white" style="background-color: #FD5631;" type="submit">Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
