<template>
  <div>
    <Navigation />
    <div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Header -->
      <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Todo Application</h1>
        <p class="mt-2 text-gray-600">Manage your tasks efficiently</p>
      </div>

      <!-- Add Todo Form -->
      <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Todo</h2>
        <form @submit.prevent="submitTodo" class="space-y-4">
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
              Title *
            </label>
            <input
              id="title"
              v-model="form.title"
              type="text"
              required
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              placeholder="Enter todo title"
            />
          </div>
          <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
              Description
            </label>
            <textarea
              id="description"
              v-model="form.description"
              rows="3"
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              placeholder="Enter todo description (optional)"
            ></textarea>
          </div>
          <div class="flex justify-end">
            <button
              type="submit"
              :disabled="!form.title.trim()"
              class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
            >
              Add Todo
            </button>
          </div>
        </form>
      </div>

      <!-- Todos List -->
      <div class="bg-white rounded-lg shadow-md">
        <div class="p-6 border-b border-gray-200">
          <h2 class="text-xl font-semibold text-gray-800">Your Todos</h2>
          <p class="text-sm text-gray-600 mt-1">
            {{ todos.length }} {{ todos.length === 1 ? 'task' : 'tasks' }} total
          </p>
        </div>
        
        <div v-if="todos.length === 0" class="p-8 text-center">
          <div class="text-gray-400 mb-4">
            <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
          </div>
          <p class="text-gray-500">No todos yet. Add your first task above!</p>
        </div>

        <div v-else class="divide-y divide-gray-200">
          <TodoItem
            v-for="todo in todos"
            :key="todo.id"
            :todo="todo"
            @toggle="toggleTodo"
            @edit="editTodo"
            @delete="deleteTodo"
          />
        </div>
      </div>
    </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import TodoItem from './TodoItem.vue'
import Navigation from '../../Components/Navigation.vue'

// Props
const props = defineProps({
  todos: Array
})

// Form data
const form = reactive({
  title: '',
  description: ''
})

// Methods
const submitTodo = () => {
  router.post('/todos', {
    title: form.title,
    description: form.description
  }, {
    onSuccess: () => {
      form.title = ''
      form.description = ''
    }
  })
}

const toggleTodo = (todo) => {
  router.put(`/todos/${todo.id}`, {
    title: todo.title,
    description: todo.description,
    completed: !todo.completed
  })
}

const editTodo = (todo, updatedData) => {
  router.put(`/todos/${todo.id}`, updatedData)
}

const deleteTodo = (todo) => {
  if (confirm('Are you sure you want to delete this todo?')) {
    router.delete(`/todos/${todo.id}`)
  }
}
</script>