<script context="module">
    import Nav from "./Nav.svelte";
</script>

<script>
  import { page } from '@inertiajs/svelte'
  export let username = $page.props.auth.user.username;
</script>

<section class="p-6 bg-gray-100">
    <header class="flex ">
        <div class="flex items-center">
            <h1 class="font-bold text-lg">Definetly an App</h1>
            <p class="text-sm ml-4">Olá, {username}</p>
        </div>
        <Nav />
    </header>
</section>

<section class="p-6">
    <div class="max-w-2xl mx-auto ">
        <slot />
    </div>
</section>