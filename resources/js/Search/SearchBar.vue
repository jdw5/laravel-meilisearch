<template>
    <div class="relative flex-grow sm:mr-8 ">
        <input v-model="search" 
            placeholder="Search..."
            class="block w-full p-3 text-sm border border-gray-300 rounded outline-none sm:text-base focus:ring-1 focus:border-indigo-500" />
        <svg v-if="!search" class="absolute w-6 h-6 text-gray-500 top-3 right-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        <svg v-else @click="search = ''" class="absolute w-6 h-6 text-gray-500 cursor-pointer top-3 right-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </div>

</template>

<script>

export default {
    data() {
        return {
            search: '',
        }
    },

    watch: {
        search() {
            if ('URLSearchParams' in window) {
                var searchParams = new URLSearchParams(window.location.search);
                searchParams.set("search", this.search);

                if (this.search == '' ||  this.search == null) {
                    searchParams.delete('search')
                } 

                var newRelativePathQuery = window.location.pathname + '?' + searchParams.toString().toLowerCase();
                history.pushState(null, '', newRelativePathQuery);
                this.$inertia.reload({ only: ['search'] })
            }
        },
    }

}
</script>
