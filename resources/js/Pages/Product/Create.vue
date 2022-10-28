<script setup>
import {useForm} from '@inertiajs/inertia-vue3';
const form=useForm({
  name:'',
  type:'',
  price:'',
  stock:''
});
const submit=()=>{
  form.post(route('product.create'),{
    onFinish:()=>console.log("product created")
  })
}
</script>
<template>

  <h1>Create product</h1>
  <form @submit.prevent="submit">
    <div>
      <label for="name">Name</label><input id="name" type="text" v-model="form.name">
    </div>
    <div><label for="price">Price</label><input id="price" type="text" v-model="form.price"></div>
    <div><label for="stock">Stock</label><input id="stock" type="number" v-model="form.stock"></div>
    <div><label for="type">Type</label><input id="type" type="text" v-model="form.type"></div>
    <button type="submit">Enviar</button>
  </form>
</template>