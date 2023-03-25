<script>
    import NavLink from './NavLink.svelte';
</script>

<nav class="ml-6">
    <ul class="flex list-disc space-x-5">
        <li><NavLink pagina={'Home'} href="/">Pagina Inicial</NavLink></li>
        <li><NavLink pagina={'Fretes'} href="/fretes">Fretes</NavLink></li>
        <li><NavLink pagina={'Carreteiros'} href="/carreteiros">Carreteiros</NavLink></li>
        <li><NavLink href="/logout" method="post">Logout</NavLink></li>
    </ul>
</nav>