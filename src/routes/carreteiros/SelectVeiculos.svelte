<script>
	export let veiculo = "";

</script>

<select bind:value={veiculo} name="veiculos" id="veiculos">
  <option value="furgao">Furgao</option>
  <option value="toco">Toco</option>
  <option value="3/4">3/4</option>
  <option value="truck">Truck</option>
  <option value="carreta">Carreta</option>
</select>