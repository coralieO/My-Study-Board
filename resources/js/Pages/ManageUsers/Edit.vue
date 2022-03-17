<template>
<app-layout>
    <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                CREATE TASK
            </h2>
        </template>
    <div class="flex items-center min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
            <div class="mb-6">
                <h1 class="block mb-2 text-sm text-dark-600 dark:text-dark-400">My new task</h1>

            </div>
            <div class="m-7">
               <form @submit.prevent="submit">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Name</label>
                        <input id="name" v-model="form.name" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                     <div v-if="errors.Title">{{errors.name}}</div>
                    </div>
                    <div class="mb-6">
                    <div class="mb-6">
                        <label for="firstName" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">First Name</label>
                        <input id="firstName" v-model="form.firstName" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    <div v-if="errors.firstName">{{errors.firstName}}</div>
                    <jet-input-error :message="errors.firstName" class="mt-2" />
                    </div>
                        <label for="class" class="text-sm text-gray-600 dark:text-gray-400">Class</label>
                        <select id="class" v-model="form.class" required  class="border border-gray-300 rounded text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <option value="A2">A2</option>
                                    <option value="A3">A3</option>
                                    <option value="A4">A4</option>
                                    <option value="A5">A5</option>
                        </select>
                    <div v-if="errors.Status">{{errors.class}}</div>
                    </div>
                    <div class="mb-6">
                        <label for="role" class="text-sm text-gray-600 dark:text-gray-400">Role</label>
                        <select id="role" v-model="form.role" required  class="border border-gray-300 rounded text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                        </select>
                    <div v-if="errors.role">{{errors.role}}</div>
                    <jet-input-error :message="errors.role" class="mt-2" />
                    </div>
                       <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email</label>
                        <input id="email" v-model="form.email" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"/>
                    <div v-if="errors.role">{{errors.email}}</div>
                    <jet-input-error :message="errors.email" class="mt-2" />
                    </div>
                    <div class="p-2 flex justify-end rounded-b">
                      <button type="submit" class="w-full px-3 py-4 text-black bg-white-100 rounded-md focus:bg-indigo-300 border-2 focus:outline-none"> <a href="/manageUsers"> Annuler</a></button>
                      <button  type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">Sauvegarde</button>
                    </div>
                    <p class="text-base text-center text-gray-400" id="result">
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>



</app-layout>

</template>

<script>

import AppLayout from '../../Layouts/AppLayout'
import JetInputError from '../../Jetstream/InputError'
export default {
 data() {
    return {
      form: this.$inertia.form({
        name: this.users.name,
        firstName: this.users.firstName,
        class:this.users.class,
        role: this.users.role,
        email:this.users.email,
      })
    }
  },
 components: {
        AppLayout,
        JetInputError
    },
 props:['errors', 'users'],
  methods: {
    submit() {
       this.$inertia.put(this.route('admin.user.update', this.users.id), this.form)

    },
  },
}


</script>
