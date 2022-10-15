<script setup>
const {roles}=defineProps(['roles']);

</script>
<template>
    <h1>Look at roles</h1>
    <ul>
        <li v-for="role in roles"><span>{{role.role}}</span><a :href="`/roles/delete/${role.id}`">delete</a></li>
    </ul>
</template>
