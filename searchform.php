<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="relative">
        <input type="search"
            class="search-field bg-gray-100 dark:bg-gray-700 text-text-light dark:text-text-dark focus:ring-brand-primary-500 focus:border-primary block w-full pl-4 pr-10 sm:text-sm border-gray-200 dark:border-gray-600 rounded-full py-2"
            placeholder="<?php echo esc_attr__('Buscar...', 'edusiteco'); ?>" value="<?php echo get_search_query(); ?>"
            name="s" />
        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
            <button 
                type="submit"
                class="search-submit bg-transparent p-1 text-gray-400 dark:text-gray-300 transition-colors"
                aria-label="Buscar"
            >
                <svg class="h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#F4F4F4">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M11 6C13.7614 6 16 8.23858 16 11M16.6588 16.6549L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            </button>
        </div>
    </div>
</form>