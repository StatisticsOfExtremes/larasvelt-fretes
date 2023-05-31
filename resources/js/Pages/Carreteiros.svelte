<script context="module">
    export { default as layout } from './Components/Layout.svelte';
  </script>

<script>
	import { page } from '@inertiajs/svelte';
	import { Link } from '@inertiajs/svelte';
	let carreteiros = $page.props.carreteiros;
</script>

<main>

	<div>
		<h1>
			Carreteiros
		</h1>

	</div>


	<div>
		<div class="">
			<Link as="button" href="/carreteiros/novo" class="px-4 py-2 font-semibold text-sm bg-green-700 text-white text-left rounded-full shadow-sm">Adicionar</Link>
		</div>


		<table class="content-stretch">
			<thead>
				<tr>
					<th> # </th>
					<th> Nome </th>
					<th> Veiculo Ativo </th>
				</tr>
			</thead>

			<tbody>
				{#each carreteiros as carreteiro, index}
				<tr>
					<td>{carreteiro.id}</td>
					<td>{carreteiro.nome}</td>
					<td>
						{#each carreteiro.veiculos as veiculo}
							{veiculo.placa}
						{/each}
					</td>

					<td>
						<Link href="carreteiros/apagar/{carreteiro.id}" method="post">Excluir</Link>
					</td>
				</tr>
				{/each}
			</tbody>
		</table>

	</div>

	

</main>