<template>
    <main>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container">
                <router-link exact-active-class="active" to="/" class="navbar-brand nav-link active" aria-current="page">Inicio</router-link>
            </div>
        </nav>
        <div class="container">
            <router-view></router-view>
        </div>
    </main>
</template>
