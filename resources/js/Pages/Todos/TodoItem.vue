<template>
  <div class="p-6 hover:bg-gray-50 transition-colors">
    <div v-if="!isEditing" class="flex items-start space-x-4">
      <!-- Checkbox -->
      <button
        @click="$emit('toggle', todo)"
        class="flex-shrink-0 mt-1"
      >
        <div class="w-5 h-5 rounded border-2 flex items-center justify-center transition-colors"
             :class="todo.completed 
               ? 'bg-green-500 border-green-500 text-white' 
               : 'border-gray-300 hover:border-green-400'"
        >
          <svg v-if="todo.completed" class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </div>
      </button>

      <!-- Content -->
      <div class="flex-1 min-w-0">
        <h3 class="text-lg font-medium transition-colors"
            :class="todo.completed ? 'text-gray-500 line-through' : 'text-gray-900'"
        >
          {{ todo.title }}
        </h3>
        <p v-if="todo.description" 
           class="mt-1 text-sm transition-colors"
           :class="todo.completed ? 'text-gray-400' : 'text-gray-600'"
        >
          {{ todo.description }}
        </p>
        <div class="mt-2 flex items-center space-x-2 text-xs text-gray-500">
          <span>Created {{ formatDate(todo.created_at) }}</span>
          <span v-if="todo.updated_at !== todo.created_at">
            • Updated {{ formatDate(todo.updated_at) }}
          </span>
        </div>
      </div>

      <!-- Actions -->
      <div class="flex-shrink-0 flex items-center space-x-2">
        <button
          @click="startEditing"
          class="p-2 text-gray-400 hover:text-blue-600 transition-colors"
          title="Edit todo"
        >
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
        </button>
        <button
          @click="$emit('delete', todo)"
          class="p-2 text-gray-400 hover:text-red-600 transition-colors"
          title="Delete todo"
        >
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Edit Form -->
    <div v-else class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
        <input
          v-model="editForm.title"
          type="text"
          required
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea
          v-model="editForm.description"
          rows="3"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        ></textarea>
      </div>
      <div class="flex items-center space-x-3">
        <label class="flex items-center">
          <input
            v-model="editForm.completed"
            type="checkbox"
            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
          />
          <span class="ml-2 text-sm text-gray-700">Mark as completed</span>
        </label>
      </div>
      <div class="flex justify-end space-x-3">
        <button
          @click="cancelEditing"
          class="px-4 py-2 text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors"
        >
          Cancel
        </button>
        <button
          @click="saveEdit"
          :disabled="!editForm.title.trim()"
          class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
        >
          Save Changes
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue'

// Props
const props = defineProps({
  todo: Object
})

// Emits
const emit = defineEmits(['toggle', 'edit', 'delete'])

// State
const isEditing = ref(false)
const editForm = reactive({
  title: '',
  description: '',
  completed: false
})

// Methods
const startEditing = () => {
  editForm.title = props.todo.title
  editForm.description = props.todo.description || ''
  editForm.completed = props.todo.completed
  isEditing.value = true
}

const cancelEditing = () => {
  isEditing.value = false
}

const saveEdit = () => {
  emit('edit', props.todo, {
    title: editForm.title,
    description: editForm.description,
    completed: editForm.completed
  })
  isEditing.value = false
}

const formatDate = (dateString) => {
  const date = new Date(dateString)
  return date.toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  })
}
</script>