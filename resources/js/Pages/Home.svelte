<script context="module">
    import { page } from '@inertiajs/svelte';
    export { default as layout } from './Components/Layout.svelte';
</script>

<script>
    export let username = $page.props.auth.user.username;
</script>


<div>
    <h1>Bem Vindo {username}</h1>
</div>
