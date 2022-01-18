<template>
    <div class="row row-cols-3 p-1 mb-3 bg-dark">
        <div class="col-auto">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                    </div>
                    <ul class="nav">
                        <li class="nav-item">
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
            </nav>
        </div>
        <div class="col-2" style="margin-top: 0.5em">
            <a class="btn btn-secondary" v-if="auth===true" href="/">Logout</a>
            <a class="" href="/" v-else>Login</a>
            <a href="/" style="background-color: #FD5631; margin-right: 1em" class="btn    ">AddOffer</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Upper",
    props: ['auth'],
}
</script>

<style scoped>

</style>
