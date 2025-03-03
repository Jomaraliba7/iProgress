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
        <div class="max-w-4xl mx-auto animate-none">
            <script>
                const regions = [
                    {
                        name: "Cordillera Administrative Region (CAR)",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Provincial Office 1": ["Project Name 1", "Project Name 2"],
                                "Provincial Office 2": ["Project Name 1"]
                            },
                            "Community Service Center": {
                                "Community Service Office 1": ["Project Name 1"],
                                "Community Service Office 2": ["Project Name 1", "Project Name 2"]
                            }
                        }
                    },
                    {
                        name: "Region 1",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Ilocos Norte Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Ilocos Sur Provincial Office": ["Project Name 1", "Project Name 2"],
                                "La Union Interim Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Pangasinan Provincial Office": ["Project Name 1", "Project Name 2"]
                                
                            },
                            "Community Service Center": {
                                "Dingras Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Banayoyo Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Tagudin Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Sudipen Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Pugo Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Sison Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Urdaneta Community Service Center": ["Project Name 1", "Project Name 2"]
                            }
                        }
                    },
                    {
                        name: "Region 3",
                        structure: {
                            "Regional Office": ["Project Name 5", "Project Name 6"],
                            "Provincial Office": {
                                "Provincial Office 5": ["Project Name 5", "Project Name 6"],
                                "Provincial Office 6": ["Project Name 5"]
                            },
                            "Community Service Center": {
                                "Community Service Office 5": ["Project Name 5"],
                                "Community Service Office 6": ["Project Name 5", "Project Name 6"]
                            }
                        }
                    },
                    {
                        name: "Region 4A",
                        structure: {
                            "Regional Office": ["Project Name 7", "Project Name 8"],
                            "Provincial Office": {
                                "Provincial Office 7": ["Project Name 7", "Project Name 8"],
                                "Provincial Office 8": ["Project Name 7"]
                            },
                            "Community Service Center": {
                                "Community Service Office 7": ["Project Name 7"],
                                "Community Service Office 8": ["Project Name 7", "Project Name 8"]
                            }
                        }
                    },
                    {
                        name: "Region 4B",
                        structure: {
                            "Regional Office": ["Project Name 9", "Project Name 10"],
                            "Provincial Office": {
                                "Provincial Office 9": ["Project Name 9", "Project Name 10"],
                                "Provincial Office 10": ["Project Name 9"]
                            },
                            "Community Service Center": {
                                "Community Service Office 9": ["Project Name 9"],
                                "Community Service Office 10": ["Project Name 9", "Project Name 10"]
                            }
                        }
                    },
                    {
                        name: "Region 5",
                        structure: {
                            "Regional Office": ["Project Name 11", "Project Name 12"],
                            "Provincial Office": {
                                "Provincial Office 11": ["Project Name 11", "Project Name 12"],
                                "Provincial Office 12": ["Project Name 11"]
                            },
                            "Community Service Center": {
                                "Community Service Office 11": ["Project Name 11"],
                                "Community Service Office 12": ["Project Name 11", "Project Name 12"]
                            }
                        }
                    },
                    {
                        name: "Region 6/7",
                        structure: {
                            "Regional Office": ["Project Name 13", "Project Name 14"],
                            "Provincial Office": {
                                "Provincial Office 13": ["Project Name 13", "Project Name 14"],
                                "Provincial Office 14": ["Project Name 13"]
                            },
                            "Community Service Center": {
                                "Community Service Office 13": ["Project Name 13"],
                                "Community Service Office 14": ["Project Name 13", "Project Name 14"]
                            }
                        }
                    },
                    {
                        name: "Region 9",
                        structure: {
                            "Regional Office": ["Project Name 15", "Project Name 16"],
                            "Provincial Office": {
                                "Provincial Office 15": ["Project Name 15", "Project Name 16"],
                                "Provincial Office 16": ["Project Name 15"]
                            },
                            "Community Service Center": {
                                "Community Service Office 15": ["Project Name 15"],
                                "Community Service Office 16": ["Project Name 15", "Project Name 16"]
                            }
                        }
                    },
                    {
                        name: "Region 10",
                        structure: {
                            "Regional Office": ["Project Name 17", "Project Name 18"],
                            "Provincial Office": {
                                "Provincial Office 17": ["Project Name 17", "Project Name 18"],
                                "Provincial Office 18": ["Project Name 17"]
                            },
                            "Community Service Center": {
                                "Community Service Office 17": ["Project Name 17"],
                                "Community Service Office 18": ["Project Name 17", "Project Name 18"]
                            }
                        }
                    },
                    {
                        name: "Region 11",
                        structure: {
                            "Regional Office": ["Project Name 19", "Project Name 20"],
                            "Provincial Office": {
                                "Provincial Office 19": ["Project Name 19", "Project Name 20"],
                                "Provincial Office 20": ["Project Name 19"]
                            },
                            "Community Service Center": {
                                "Community Service Office 19": ["Project Name 19"],
                                "Community Service Office 20": ["Project Name 19", "Project Name 20"]
                            }
                        }
                    },
                    {
                        name: "Region 12",
                        structure: {
                            "Regional Office": ["Project Name 21", "Project Name 22"],
                            "Provincial Office": {
                                "Provincial Office 21": ["Project Name 21", "Project Name 22"],
                                "Provincial Office 22": ["Project Name 21"]
                            },
                            "Community Service Center": {
                                "Community Service Office 21": ["Project Name 21"],
                                "Community Service Office 22": ["Project Name 21", "Project Name 22"]
                            }
                        }
                    },
                    {
                        name: "Region 13",
                        structure: {
                            "Regional Office": ["Project Name 23", "Project Name 24"],
                            "Provincial Office": {
                                "Provincial Office 23": ["Project Name 23", "Project Name 24"],
                                "Provincial Office 24": ["Project Name 23"]
                            },
                            "Community Service Center": {
                                "Community Service Office 23": ["Project Name 23"],
                                "Community Service Office 24": ["Project Name 23", "Project Name 24"]
                            }
                        }
                    }
                ];
            </script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const container = document.querySelector(".max-w-4xl");

                    regions.forEach(region => {
                        const regionId = region.name.replace(/\s+/g, '').replace(/[()\/]/g, '');
                        let regionContent = `
                            <div class="bg-white shadow-lg rounded-lg p-3 pb-1 mb-4">
                                <h3 class="flex items-center justify-between text-lg font-semibold text-gray-900 cursor-pointer p-2 rounded-lg hover:bg-gray-100 transition"
                                    onclick="toggleDropdown('${regionId}Dropdown')">
                                    <div class="flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 6a1 1 0 011-1h5l2-2h6a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6z" />
                                        </svg>
                                        <span>${region.name}</span>
                                    </div>
                                    <svg id="arrowIcon-${regionId}Dropdown" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform transform rotate-0" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </h3>
                                <ul id="${regionId}Dropdown" class="space-y-0 pl-6 hidden opacity-100 transition-opacity duration-300">
                        `;

                        Object.keys(region.structure).forEach(subfolder => {
                            const subId = subfolder.replace(/\s+/g, '');

                            if (Array.isArray(region.structure[subfolder])) {
                                // Directly show projects under "Regional Office"
                                regionContent += `
                                    <li>
                                        <h4 class="flex items-center space-x-2 p-2 rounded-lg bg-gray-50 hover:bg-blue-100 transition cursor-pointer"
                                            onclick="toggleDropdown('${regionId}${subId}Dropdown')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M3 6a1 1 0 011-1h5l2-2h6a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6z" />
                                            </svg>
                                            <span>${subfolder}</span>
                                        </h4>
                                        <ul id="${regionId}${subId}Dropdown" class="space-y-0 pl-6 hidden opacity-100 transition-opacity duration-300">
                                            ${region.structure[subfolder].map(project => `
                                                <li>
                                                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg bg-gray-50 hover:bg-blue-100 transition">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M3 6a1 1 0 011-1h5l2-2h6a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6z" />
                                                        </svg>
                                                        <span>${project}</span>
                                                    </a>
                                                </li>
                                            `).join('')}
                                        </ul>
                                    </li>
                                `;
                            } else {
                                // Handle Provincial Office & Community Service Center with sub-offices
                                regionContent += `
                                    <li>
                                        <h4 class="flex items-center space-x-2 p-2 rounded-lg bg-gray-50 hover:bg-blue-100 transition cursor-pointer"
                                            onclick="toggleDropdown('${regionId}${subId}Dropdown')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M3 6a1 1 0 011-1h5l2-2h6a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6z" />
                                            </svg>
                                            <span>${subfolder}</span>
                                        </h4>
                                        <ul id="${regionId}${subId}Dropdown" class="space-y-0 pl-6 hidden opacity-100 transition-opacity duration-300">
                                `;

                                Object.keys(region.structure[subfolder]).forEach(subOffice => {
                                    const subOfficeId = subOffice.replace(/\s+/g, '');
                                    regionContent += `
                                        <li>
                                            <h5 class="flex items-center space-x-2 p-2 rounded-lg bg-gray-100 hover:bg-blue-200 transition cursor-pointer"
                                                onclick="toggleDropdown('${regionId}${subId}${subOfficeId}Dropdown')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M3 6a1 1 0 011-1h5l2-2h6a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6z" />
                                                </svg>
                                                <span>${subOffice}</span>
                                            </h5>
                                            <ul id="${regionId}${subId}${subOfficeId}Dropdown" class="space-y-0 pl-6 hidden opacity-100 transition-opacity duration-300">
                                                ${region.structure[subfolder][subOffice].map(project => `
                                                    <li>
                                                        <a href="#" class="flex items-center space-x-2 p-2 rounded-lg bg-gray-50 hover:bg-blue-100 transition">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                                <path d="M3 6a1 1 0 011-1h5l2-2h6a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6z" />
                                                            </svg>
                                                            <span>${project}</span>
                                                        </a>
                                                    </li>
                                                `).join('')}
                                            </ul>
                                        </li>
                                    `;
                                });

                                regionContent += `</ul></li>`;
                            }
                        });

                        regionContent += `</ul></div>`;
                        container.innerHTML += regionContent;
                    });
                });
            </script>
        </div>
    </div>

    <script>
        function toggleDropdown(id) {
            let dropdown = document.getElementById(id);
            if (dropdown) {
                dropdown.classList.toggle("hidden");
            }
        }
    </script>
</x-app-layout>