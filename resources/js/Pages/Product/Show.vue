<script setup>
const props = defineProps(["products"])
console.log(props.products)
</script>
<template>
    <h3 align="Center">
        Lista de productos
    </h3>
    <br>
<table class="table" align="center">
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Productos</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    <tr v-for="(product, index) in props.products">
      <td><td><td><td><th scope="row">{{index + 1}}</th></td></td></td></td>
      <td align="center">{{product.name}}</td>
      <td align="center"><button>Editar</button></td>
      <td align="center"><a :href="`/product/delete/${product.id}`">Eliminar</a></td>
    </tr>
</tbody>
</table>
</template>