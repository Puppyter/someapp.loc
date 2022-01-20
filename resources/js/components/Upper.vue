<template>
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #191429; margin-top: 1em; margin-bottom: 1em">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">SomeApp</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link active text-white-50" aria-current="page" href="/offers">Offers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2" style="margin-top: 0.5em">
                        <a class="" v-if="auth===true" style="text-decoration: none;margin-right: 1em;" href="/logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>Logout</a>
                        <a class="text-white-50" style="text-decoration: none; margin-right: 1em;" href="/users" v-else><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>Login</a>
                        <a href="/offers/create" style="background-color: #FD5631; margin-right: 1em" class="btn text-white">
                            <svg style="margin-right: 0.5em; color:white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                            AddOffer
                        </a>
                    </div>
                </div>
            </nav>
</template>

<script>
export default {
    name: "Upper",
    props: ['auth'],
}
</script>

<style scoped>

</style>
