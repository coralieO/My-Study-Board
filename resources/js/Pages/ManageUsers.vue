<template>
<app-layout>
    <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage Users
            </h2>
    </template>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
                        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                            <div class="mb-4">
                                <h1 class="text-grey-darkest">User list</h1>
                                <table class="table-fixed">
                                <thead>
                                    <tr>
                                    <th>Name</th>
                                    <th>First name</th>
                                    <th>Class</th>
                                    <th>Role</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody v-for="user in users" :key="user.id" >
                                    <tr >
                                    <td>{{user.name}}</td>
                                    <td>{{user.firstName}}</td>
                                    <td>{{user.class}}</td>
                                    <td>{{user.role}}</td>
                                    <td><button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green"><a :href="route('admin.user.edit', user.id)" :active="route().current('admin.user.edit')">Edit</a></button></td>
                                    <td><button @click="destroy(`${user.id}`)" class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Remove </button></td>
                                    </tr>

                                </tbody>
                                </table>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</app-layout>
</template>

<script>

import AppLayout from '../Layouts/AppLayout.vue'

export default {
    props: ['users'],
     components: {
        AppLayout,
    },
 methods:{
        destroy(id){
        if(confirm("Do you really want to delete?")){

        this.$inertia.delete(this.route('admin.user.delete',`${id}` ))}
            }
            }
}
</script>
