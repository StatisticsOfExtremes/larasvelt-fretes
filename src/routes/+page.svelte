<script>
let data = [
	{
		id: 1,
		cliente: "Ancora 09",
		cidade: "Recife"
	},
	{
		id: 2,
		cliente: "Ancora 20",
		cidade: "Maceio"
		}
];

	function addData(e) {
	
	let formData = new FormData(e.target);
	
	formData = Object.fromEntries(formData);

	
	const fields = (dados) => {
		
		const {cidade, cliente} = dados;
		
		return {
			id: data.length + 1,
			cidade,
			cliente
		}
		
	};
	
	data = [...data, fields(formData)];
	}
	
;
</script>


<main>
<form id="frete" name="frete" on:submit|preventDefault={addData}>

<div>
<label for="cliente">CLIENTE:</label>
<input type="text" id="cliente" name="cliente">
</div>

<div>
<label for="cidade">CIDADE:</label>
<input type="text" id="cidade" name="cidade" >
</div>

<input type="submit" value="Submit">


<div>
	<p> tamanho da base é: {data.length} </p>
</div>


</form>


<table>
  <tr>
    <th>#</th>
    <th>Cliente</th>
    <th>Cidade</th>
  </tr>
  <tbody>
	{#each Object.values(data) as row}
		<tr>
			{#each Object.values(row) as cell}
				<td>
				{cell}
				</td>
			{/each}
		</tr>
	{/each}
  </tbody>
</table> 
</main>