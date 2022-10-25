<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

const {roles}=defineProps(['roles']);

</script>
<template>
    <AppLayout title="roles">
    <h1>Look at roles</h1>
    <ul>
        <li v-for="role in roles"><span>{{ role.role }}</span><a :href="`/roles/delete/${role.id}`">delete</a></li>
    </ul>
    </AppLayout>
</template>
