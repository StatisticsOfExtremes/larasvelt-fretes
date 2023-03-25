<script>
    import { Link, page } from "@inertiajs/svelte";

    export let href;
    export let method = '';

    export let pagina = ''; 
</script>

    <Link href={href} method={method} class="text-blue-500 hover:underline {pagina === $page.component ? 'font-bold underline' : ''}" >
        <slot />
    </Link>


