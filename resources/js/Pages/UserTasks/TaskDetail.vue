<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Task Detail
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
                        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                            <div class="mb-4">
                                <h1 class="text-grey-darkest">My tasks</h1>
                                <div>
                                <div  class="flex mb-4 items-center">
                                        <h2 class="w-full text-grey-darkest">{{tasks.Title}}</h2>
                                        <h2 class="w-full text-grey-darkest">{{tasks.Description}}</h2>
                                        <h2 class="w-full text-grey-darkest">{{tasks.create_at}}</h2>
                                        <h2 class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded">{{tasks.Status}}</h2>
                                        <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green"> <a :href="route('user.task.edit', tasks.id)" :active="route().current('user.task.edit')">Edit</a></button>
                                         <button @click="destroy(`${tasks.id}`)" class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Remove </button>
                                </div>
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
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'



    export default defineComponent({
        props: ['tasks'],
        components: {
            AppLayout,
        },
        methods:{
        destroy(id){
        if(confirm("Do you really want to delete?")){

        this.$inertia.delete(this.route('user.task.delete',`${id}` ))}
            }
            }
    })
</script>
