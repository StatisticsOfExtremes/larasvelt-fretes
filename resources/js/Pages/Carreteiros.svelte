<script context="module">
    export { default as layout } from './Components/Layout.svelte';

  </script>

<script>
	import { page } from '@inertiajs/svelte';
	import { Link } from '@inertiajs/svelte';
    import { router } from '@inertiajs/svelte'

	let carreteiros = $page.props.carreteiros;


    async function handleDelete(id) {
        const response = await router.post(`carreteiros/apagar/${id}`, {method: 'post'});
        $: carreteiros = carreteiros.filter(carreteiros => carreteiros.id != id );

        console.log(response);
    }
</script>

<main>
	<div>
		<div class="p-3">
			<a href="/carreteiros/novo" class=" self-end px-4 py-2 font-semibold text-sm bg-green-700 text-white text-left rounded-full shadow-sm hover:bg-green-900">Adicionar</a>
		</div>

		<table class="table-fixed">
			<thead>
				<tr>
					<th class='w-8'> # </th>
					<th class='w-64 text-center'> Nome </th>
					<th class='w-50 text-center'> Veiculo Ativo </th>
                    <th> Tipo </th>
                    <th> </th>
				</tr>
			</thead>

			<tbody>
				{#each carreteiros as carreteiro}
				<tr>
					<td class='text-center'>{carreteiro.id}</td>
					<td class='text-center'>{carreteiro.nome}</td>
                        {#if carreteiro.veiculos.length > 1}
                            <td class='text-center'>
                                {carreteiro.veiculos[0].placa} {carreteiro.veiculos[1].placa}
                            </td>

                            <td class='text-center'> {carreteiro.veiculos[1].tipo} </td>

                            <td>
                                <button class="border rounded p-1.5 hover:bg-red-600" on:click={() => handleDelete(carreteiro.id)}>Excluir</button>
                            </td>
                        {:else if carreteiro.veiculos.length > 0}
                            <td class='text-center'>
                                {carreteiro.veiculos[0].placa}
                            </td>

                            <td class='text-center'> {carreteiro.veiculos[0].tipo} </td>

                            <td>
                                <button class="border rounded p-1.5 hover:bg-red-600" on:click={() => handleDelete(carreteiro.id)}>Excluir</button>
                            </td>
                        {:else}
                            <td></td>
                            <td></td>
                            <td>
                                <button class="border rounded p-1.5 hover:bg-red-600" on:click={() => handleDelete(carreteiro.id)}>Excluir</button>
                            </td>
                        {/if}
				</tr>
				{/each}
			</tbody>
		</table>
	</div>



</main>
