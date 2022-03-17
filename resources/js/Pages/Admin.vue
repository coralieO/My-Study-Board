<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Student Dashboard
            </h2>
        </template>
            <jet-button >
                 <a :href="route('admin.task.create')" :active="route().current('admin.task.create')" class="text-white-600 hover:text-white-900">Create new task</a>
            </jet-button>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
                        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                            <div class="mb-4">
                                <h1 class="text-grey-darkest">All tasks</h1>
                                <div>
                                <div v-for="task in tasks" :key="task.id" class="flex mb-4 items-center">
                                        <h2 class="w-full text-grey-darkest"><a :href="route('admin.task.show', task.id)" :active="route().current('admin.task.show')">{{task.Title}}</a> </h2>
                                        <h2 class="w-full text-grey-darkest">{{task.user.name}} </h2>
                                        <h2 class="w-full text-grey-darkest">{{task.create_at}}</h2>
                                        <h2 class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded">{{task.Status}}</h2>
                                        <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green">Done</button>
                                        <button @click="destroy(`${task.id}`)" class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Remove </button>
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

        this.$inertia.delete(this.route('admin.task.delete',`${id}` ))}
            }
            }
    })
</script>
