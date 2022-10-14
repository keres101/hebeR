<script setup>
import {useForm} from '@inertiajs/inertia-vue3';
import AppLayout from '../../Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const {roles}=defineProps(['roles'])

const form=useForm({
    name:'',
    email:'',
    password:'',
    password_confirmation:'',
    last_name:'',
    DNI:'',
    date_of_birth:'',
    direction:'',
    rol:'',
    terms:false
});

const submit=()=>{
    console.log("Hello");
    form.post(route('employee.save'),{
        onFinish:()=>console.log("Hello finish")
    })
}
</script>

<template>
    <AppLayout title="Create Employee">
        <div class="max-w-7xl mx-auto">
            <form @submit.prevent="submit" class="max-w-sm mx-auto">
                <div>
                    <label for="name">Name</label>
                    <input id="name" type="text" v-model="form.name">
                </div>
                <div>
                    <label for="last_name">Last Name</label>
                    <input id="last_name" type="text" v-model="form.last_name">
                </div>
                <div>
                    <label for="DNI">DNI</label>
                    <input id="DNI" type="text" v-model="form.DNI" >
                </div>
                <div>
                    <label for="date_of_birth">Date of birth</label>
                    <input id="date_of_birth" type="date" v-model="form.date_of_birth">
                </div>
                <div>
                    <label for="direction">Direction</label>
                    <input id="direction" type="text" v-model="form.direction">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" v-model="form.email">
                </div>
                <div>
                    <select name="rol" v-model="form.rol">
                        <option v-for="rol in roles" :value="rol">{{rol}}</option>
                    </select>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" v-model="form.password">
                </div>
                <div>
                    <label for="password_confirmation">Password confirmation</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" v-model="form.password_confirmation">
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </AppLayout>
</template>
