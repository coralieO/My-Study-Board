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
                    <input type="hidden" id="user_id" value="{{ auth()->user()->id }}" name="user_id">
                    <input type="hidden" id="create_at" value="{{ now()->format('Y-m-d') }}" name="create_at">
                    <div class="mb-6">
                        <label for="Title" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Title</label>
                        <input id="Title" v-model="form.Title" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                     <div v-if="errors.Title">{{errors.Title}}</div>
                    </div>
                    <div class="mb-6">
                    <div class="mb-6">
                        <label for="Description" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Description</label>
                        <textarea id="Description" v-model="form.Description" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" ></textarea>
                    <div v-if="errors.Description">{{errors.Description}}</div>
                    <jet-input-error :message="errors.Description" class="mt-2" />
                    </div>
                        <label for="Status" class="text-sm text-gray-600 dark:text-gray-400">Status</label>
                        <select id="Status" v-model="form.Status" required  class="border border-gray-300 rounded text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <option value="start">Start</option>
                                    <option value="in progress">In progress</option>
                                    <option value="finish">Finish</option>
                        </select>
                    <div v-if="errors.Status">{{errors.Status}}</div>
                    </div>

                    <div class="p-2 flex justify-end rounded-b">
                      <button type="submit" class="w-full px-3 py-4 text-black bg-white-100 rounded-md focus:bg-indigo-300 border-2 focus:outline-none"> <a href="/Admin"> Annuler</a></button>
                        <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">Sauvegarder</button>
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
        Title: "",
        Description:"",
        Status:"",
        user_id:"",
        create_at:"",
      })
    }
  },
 components: {
        AppLayout,
        JetInputError
    },
 props:['errors'],
  methods: {
    submit() {
      this.$inertia.post(this.route('admin.task.store'), this.form);
    },
  },

}

</script>
