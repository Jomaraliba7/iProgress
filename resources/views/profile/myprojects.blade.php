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
                                "Abra Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Apayao Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Benguet Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Mountain Province Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Ifugao Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Kalinga Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Baguio City Office": ["Project Name 1", "Project Name 2"]
                            },
                            "Community Service Center": {
                                "Community Service Office 1": ["Project Name 1, Project Name 2"],
                                "Danglas Community Service Center": ["Project Name 1, Project Name 2"],
                                "Licuan-Baay Community Service Center": ["Project Name 1, Project Name 2"],
                                "Manabo Community Service Center": ["Project Name 1, Project Name 2"],
                                "Kabugao Community Service Center": ["Project Name 1, Project Name 2"],
                                "Luna Community Service Center": ["Project Name 1, Project Name 2"],
                                "Conner Community Service Center": ["Project Name 1, Project Name 2"],
                                "Atok Community Service Center": ["Project Name 1, Project Name 2"],
                                "Bokod Community Service Center ": ["Project Name 1, Project Name 2"],
                                "Sablan Community Service Center ": ["Project Name 1, Project Name 2"],
                                "Itogon Community Service Center": ["Project Name 1, Project Name 2"],
                                "Sabata Community Service Center": ["Project Name 1, Project Name 2"],
                                "Sabebosa Community Service Center": ["Project Name 1, Project Name 2"],
                                "Panaba Community Service Center": ["Project Name 1, Project Name 2"],
                                "Banaue Community Service Center ": ["Project Name 1, Project Name 2"],
                                "Aguinaldo Community Service Center": ["Project Name 1, Project Name 2"],
                                "Tinoc Community Service Center": ["Project Name 1, Project Name 2"],
                                "Balbalan Community Service Center": ["Project Name 1, Project Name 2"],
                                "Tanudan Community Service Center": ["Project Name 1, Project Name 2"],
                                "Tinglayan Community Service Center": ["Project Name 1, Project Name 2"],
                                "Baguio City Community Service Center": ["Project Name 1, Project Name 2"]
                                

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
                        name: "Region 2",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Provincial Office": ["Project Name 3", "Project Name 4"]
                            },
                            "Community Service Center": {
                                "Community Service Center": ["Project Name 3", "Project Name 4"]
                            }
                        }
                    },
                    {
                        name: "Region 3",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Aurora Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Bataan Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Bulacan Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Nueva Ecija Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Pampanga Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Tarlac Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Zambales Provincial Office": ["Project Name 1", "Project Name 2"]
                            },
                            "Community Service Center": {
                                "Calabgan Community Service Center": ["Project Name 1, Project Name 2"],
                                "Dingalan Community Service Center": ["Project Name 1, Project Name 2"],
                                "Bangkal Community Service Center": ["Project Name 1, Project Name 2"],
                                "Carranglan Community Service Center": ["Project Name 1, Project Name 2"],
                                "Bamban Community Service Center": ["Project Name 1, Project Name 2"],
                                "Cabangan Community Service Center": ["Project Name 1, Project Name 2"],
                                "San Marcelino Community Service Center": ["Project Name 1, Project Name 2"]
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
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Palawan Provincial Office": ["Project Name 1, Project Name 2"],
                                "Oriental Mindoro Provincial Office": ["Project Name 1, Project Name 2"],
                                "Occidental Mindoro Provincial Office ": ["Project Name 1, Project Name 2"],
                                "Romblon Interim Provincial Office": ["Project Name 1, Project Name 2"]
                            },
                            "Community Service Center": {
                                "Brooke's Point Community Service Center": ["Project Name 1, Project Name 2"],
                                "Roxas Community Service Center": ["Project Name 1, Project Name 2"],
                                "Bulalacao Community Service Center": ["Project Name 1, Project Name 2"],
                                "San Jose Community Service Center": ["Project Name 1, Project Name 2"],
                                "Sablayan Community Service Center": ["Project Name 1, Project Name 2"],
                                "Odiongan Community Service Center": ["Project Name 1, Project Name 2"],
                                "Sibuyan Community Service Center": ["Project Name 1, Project Name 2"]
                                
                            }
                        }
                    },
                    {
                        name: "Region 5",
                        structure: {
                            "Regional Office": ["Project Name 11", "Project Name 12"],
                            "Provincial Office": {
                                "Camarines Sur Provincial Office ": ["Project Name 11", "Project Name 12"],
                                "Camarines Norte Provincial Office ": ["Project Name 11", "Project Name 12"]
                                
                            },
                            "Community Service Center": {
                                "Buhi Community Service Office ": ["Project Name 11"],
                                "Labo Community Service Office ": ["Project Name 11"],
                                "Polangui Community Service Office ": ["Project Name 11"],
                                "Sorsogon Community Service Office ": ["Project Name 11"]
                                
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
                                "Cotabato Provincial Office": ["Project Name 21", "Project Name 22"],
                                "Sultan Kudarat Provincial Office": ["Project Name 21", "Project Name 22"],
                                "South Cotabato Provincial Office": ["Project Name 21", "Project Name 22"],
                                "Sarangani Provincial Office": ["Project Name 21", "Project Name 22"],
                            },
                            "Community Service Center": {
                                "Libungan Community Service Center": ["Project Name 21"],
                                "Columbio Community Service Center": ["Project Name 21"],
                                "Senator Ninoy Aquino Community Service Center": ["Project Name 21"],
                                "Lake Sebu Community Service Center": ["Project Name 21"],
                                "Tboli Community Service Center": ["Project Name 21"],
                                "Polomolok Community Service Center": ["Project Name 21"],
                                "Alabel Community Service Center": ["Project Name 21"],
                                "Maitum Community Service Center": ["Project Name 21"]
                               
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