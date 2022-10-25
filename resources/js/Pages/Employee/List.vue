<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
const {users}=defineProps(['users']);

</script>
<template>
    <AppLayout title="employees">
            <h1>Look at the users</h1>
            <ul>
                <li v-for="user in users"><span>{{ user.name }}</span><span><a :href="`/employee/delete/${user.id}`">delete</a></span>
                </li>
            </ul>
    </AppLayout>
</template>
