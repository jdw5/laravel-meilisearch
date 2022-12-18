<template>
    <Head title="Search" />
    <!-- <AuthenticatedLayout> -->
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Search</h2>
        </template> -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form action="/search" method="get"
                        class="space-y-2"
                    >
                        <input id="query" name="query" type="search"
                            placeholder="Make a search..."
                            class="block w-full rounded" 
                        />
                        <button class="uppercase rounded px-4 py-2 bg-indigo-500 text-white">
                            Search
                        </button>
                    </form>

                    <div v-if="results" class="">
                        <div class="space-y-4 my-6">
                            <template v-if="results.length > 0">
                                <div v-for="result in results"
                                    :key="result.id" 
                                    class=""
                                >
                                    <h1 class="text-lg font-semibold">
                                        {{ result.title }}
                                    </h1>
                                    <p class="">
                                        {{ result.teaser }}
                                    </p>
                                </div>
                            </template>
                            <template v-else>
                                <p>
                                    No results found
                                </p>
                            </template>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- </AuthenticatedLayout> -->

</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        AuthenticatedLayout,
        Head,
    },

    props: {
        results: Array,
    }
    

}
</script>
