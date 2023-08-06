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
		<h1>
			Carreteiros
		</h1>

	</div>


	<div>
		<div class="">
			<a href="/carreteiros/novo" class="px-4 py-2 font-semibold text-sm bg-green-700 text-white text-left rounded-full shadow-sm">Adicionar</a>
		</div>


		<table class="content-stretch">
			<thead>
				<tr>
					<th> # </th>
					<th> Nome </th>
					<th> Veiculo Ativo </th>
                    <th> Tipo </th>
                    <th> </th>
				</tr>
			</thead>

			<tbody>
				{#each carreteiros as carreteiro, index}
				<tr>
					<td>{carreteiro.id}</td>
					<td>{carreteiro.nome}</td>
                    {#each carreteiro.veiculos as veiculo}
					<td>
                        {veiculo.placa}
					</td>

                        <td>{veiculo.tipo}</td>
                    {/each}
					<td>
						<button class="border rounded p-1.5 hover:bg-red-600" on:click={() => handleDelete(carreteiro.id)}>Excluir</button>
					</td>
				</tr>
				{/each}
			</tbody>
		</table>

	</div>



</main>
