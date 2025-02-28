<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">
                {{ __('My Projects') }}
            </h1>
            <div class="flex justify-between items-center">
            <button type="button" class="animate-pulse flex items-center space-x-2 p-2 bg-blue-700 hover:bg-blue-600 text-white rounded-xl">
                {{ __('+Create Project') }}
            </button>
            </div>
        </div>
    </x-slot>
    <!-- Regions Dropdowns -->
<div class="container mx-auto px-4 py-3">
    <div class="max-w-4xl mx-auto">
        <!-- Regions List -->
        <script>
            const regions = [
                "Cordillera Administrative Region (CAR)", "Region 1", "Region 3", "Region 4A", "Region 4B", "Region 5", 
                "Region 6/7", "Region 9", "Region 10", "Region 11", "Region 12", "Region 13"
            ];
            const subfolders = ["Regional Office", "Provincial Office", "Community Service Center"];
            const projects = ["Project Name 1", "Project Name 2"];
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const container = document.querySelector(".max-w-4xl");

                regions.forEach(region => {
                    const regionId = region.replace(/\s+/g, '').replace(/[()\/]/g, '');
                    container.innerHTML += `
                        <div class="bg-white shadow-lg rounded-lg p-3 pb-1 mb-4">
                            <h3 class="flex items-center justify-between text-lg font-semibold text-gray-900 cursor-pointer p-2 rounded-lg hover:bg-gray-100 transition"
                                onclick="toggleDropdown('${regionId}Dropdown')">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M3 6a1 1 0 011-1h5l2-2h6a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6z" />
                                    </svg>
                                    <span>${region}</span>
                                </div>
                                <svg id="arrowIcon-${regionId}Dropdown" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform transform rotate-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </h3>
                            <ul id="${regionId}Dropdown" class="space-y-0 pl-6 hidden opacity-100 transition-opacity duration-300">
                                ${subfolders.map(sub => {
                                    const subId = sub.replace(/\s+/g, '');
                                    return `
                                        <li>
                                            <h4 class="flex items-center space-x-2 p-2 rounded-lg bg-gray-50 hover:bg-blue-100 transition cursor-pointer"
                                                onclick="toggleDropdown('${regionId}${subId}Dropdown')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M3 6a1 1 0 011-1h5l2-2h6a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6z" />
                                                </svg>
                                                <span>${sub}</span>
                                            </h4>
                                            <ul id="${regionId}${subId}Dropdown" class="space-y-0 pl-6 hidden opacity-100 transition-opacity duration-300">
                                                ${projects.map(project => `
                                                    <li>
                                                        <a href="#" class="flex items-center space-x-2 p-2 rounded-lg bg-gray-50 hover:bg-blue-100 transition">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                                <path d="M3 6a1 1 0 011-1h5l2-2h6a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 01-1-1V6z" />
                                                            </svg>
                                                            <span>${project}</span>
                                                        </a>
                                                    </li>
                                                `).join('')}
                                            </ul>
                                        </li>
                                    `;
                                }).join('')}
                            </ul>
                        </div>`;
                });
            });
        </script>
    </div>
</div>

<script>
    function toggleDropdown(id) {
        let dropdown = document.getElementById(id);
        let arrowIcon = document.getElementById("arrowIcon-" + id);

        if (dropdown.classList.contains("hidden")) {
            dropdown.classList.remove("hidden");
            setTimeout(() => dropdown.classList.remove("opacity-0"), 10);
            if (arrowIcon) arrowIcon.classList.add("rotate-180");
        } else {
            dropdown.classList.add("opacity-0");
            setTimeout(() => dropdown.classList.add("hidden"), 300);
            if (arrowIcon) arrowIcon.classList.remove("rotate-180");
        }
    }
</script>
<!-- End of Regions -->
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown(dropdownID){
            document.getElementById(dropdownID).classList.toggle("hidden");
        }
    </script>
    
    <!-- Add your content here -->

</x-app-layout>