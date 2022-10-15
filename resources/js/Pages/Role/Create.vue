<script setup>
import {useForm} from '@inertiajs/inertia-vue3';

const form=useForm({
    role:''
});

const submit=()=>{
    form.post(route('roles.save'));
}

</script>

<template>
    <form @submit.prevent="submit">
        <label for="">Nombre del rol</label>
        <input type="text" v-model="form.role" />
        <button type="submit">submit</button>
    </form>
</template>
