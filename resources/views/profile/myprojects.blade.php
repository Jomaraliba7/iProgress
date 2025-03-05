<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">
                {{ __('My Projects') }}
            </h1>
            <div class="flex justify-between items-center">
                <button id="createProjectBtn" type="button" class="animate-pulse flex items-center space-x-2 p-2 bg-blue-700 hover:bg-blue-600 text-white rounded-xl">
                     {{ __('+Create Project') }}
                </button>
            </div>
        </div>
    </x-slot>

<!-- Start Modal Form -->
    <div id="projectForm" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg w-1/2 max-h-full overflow-y-auto">
        <h2 class="text-xl font-semibold mb-4">Create Project</h2>
        <form id="projectFormContent" method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @csrf

            <label>Region:</label>
            <select name="region" id="region" class="block w-full p-2 border rounded">
                <option value="Select--">Select--</option>
                <option value="CAR">CAR</option>
                <option value="Region 1">Region 1</option>
                <option value="Region 2">Region 2</option>
                <option value="Region 3">Region 3</option>
                <option value="Region 4A">Region 4A</option>
                <option value="Region 4B">Region 4B</option>
                <option value="Region 5">Region 5</option>
                <option value="Region 6/7">Region 6/7</option>
                <option value="Region 9">Region 9</option>
                <option value="Region 10">Region 10</option>
                <option value="Region 11">Region 11</option>
                <option value="Region 12">Region 12</option>
                <option value="Region 13">Region 13</option>
            </select><br>

            <label>Type of Office:</label>
            <select name="officeType" id="officeType" class="block w-full p-2 border rounded">
                <option value="Select--">Select--</option>
                <option value="Regional Office">Regional Office</option>
                <option value="Provincial Office">Provincial Office</option>
                <option value="Community Service Center">Community Service Center</option>
            </select><br>

            <label>Office:</label>
            <select name="office" id="office" class="block w-full p-2 border rounded">
                <option value="Select--">Select--</option>
            </select><br>

            <label>Project Name:</label>
            <input type="text" name="projectName" class="block w-full p-2 border rounded"><br>

            <label>Activities:</label>
            <div id="activitiesContainer"></div>
            <button type="button" onclick="addActivity()" class="bg-blue-500 text-white px-2 py-1 rounded mt-2">+ Add Activity</button><br><br>

            <label>File Upload:</label>
            <input type="file" name="projectFiles" class="block w-full p-2 border rounded"><br>

            <label>Uploaded By:</label>
            <div id="uploadedByContainer"></div>
            <button type="button" onclick="addUploader()" class="bg-blue-500 text-white px-2 py-1 rounded mt-2">+ Add Name</button><br><br>

            <label>Timestamp:</label>
            <input type="text" id="timestamp" class="block w-full p-2 border rounded" readonly>

            <div class="flex justify-end mt-4">
                <button type="button" onclick="closeForm()" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Create</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('createProjectBtn').addEventListener('click', function() {
        document.getElementById('projectForm').classList.remove('hidden');
        document.getElementById('timestamp').value = new Date().toLocaleString();
    });

    function closeForm() {
        document.getElementById('projectForm').classList.add('hidden');
    }

    function addActivity() {
        let container = document.getElementById('activitiesContainer');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'activities[]';
        input.className = 'block w-full p-2 border rounded mt-2';
        container.appendChild(input);
    }

    function addUploader() {
        let container = document.getElementById('uploadedByContainer');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'uploadedBy[]';
        input.className = 'block w-full p-2 border rounded mt-2';
        container.appendChild(input);
    }

    document.getElementById('region').addEventListener('change', updateOffices);
    document.getElementById('officeType').addEventListener('change', updateOffices);

    function updateOffices() {
        const region = document.getElementById('region').value;
        const officeType = document.getElementById('officeType').value;
        const officeSelect = document.getElementById('office');
        officeSelect.innerHTML = '<option value="Select--">Select--</option>';

        if (region !== 'Select--' && officeType !== 'Select--') {
            const selectedRegion = regions.find(r => r.name.includes(region));
            if (selectedRegion && selectedRegion.structure[officeType]) {
                const offices = selectedRegion.structure[officeType];
                if (Array.isArray(offices)) {
                    offices.forEach(office => {
                        const option = document.createElement('option');
                        option.value = office;
                        option.textContent = office;
                        officeSelect.appendChild(option);
                    });
                } else {
                    Object.keys(offices).forEach(office => {
                        const option = document.createElement('option');
                        option.value = office;
                        option.textContent = office;
                        officeSelect.appendChild(option);
                    });
                }
            }
        }
    }

    document.getElementById('projectFormContent').addEventListener('submit', function(event) {
        event.preventDefault();
        const region = document.getElementById('region').value;
        const officeType = document.getElementById('officeType').value;
        const office = document.getElementById('office').value;
        const projectName = document.getElementById('projectFormContent').projectName.value;

        if (region !== 'Select--' && officeType !== 'Select--' && office !== 'Select--' && projectName) {
            const folderPath = `/c:/Laravel Projects/${region}/${officeType}/${office}/${projectName}`;
            createFolder(folderPath);
        } else {
            alert('Please fill in all required fields.');
        }
    });

    function createFolder(path) {
        fetch('/create-folder', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ path })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Folder created successfully.');
                closeForm();
            } else {
                alert('Failed to create folder.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred.');
        });
    }
</script>
<!-- End Modal Form -->

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
                                "Batanes Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Isabela Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Nueva Viscaya Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Quirino Provincial Office": ["Project Name 1", "Project Name 2"]
                            },
                            "Community Service Center": {
                                "Sablang Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Itbayat Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Lasam Community Service Center": ["Project Name 1", "Project Name 2"],
                                "San Mariano Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Cauayan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Ilagan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Bambang Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Dupax Del Sur Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Kayapa Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Dipantan, Nagtipunan Community Service Center": ["Project Name 1", "Project Name 2"]
                            }
                        }
                    },
                    {
                        name: "Region 3",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Bataan Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Nueva Ecija Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Tarlac Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Zambales Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Aurora Provincial Office": ["Project Name 1", "Project Name 2"]
                            },
                            "Community Service Center": {
                                "Bangkal Community Service Center": ["Project Name 1", "Project Name 2"],
                                "DRT, Bulacan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Carranglan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Dapdap Community Service Center": ["Project Name 1", "Project Name 2"],
                                "San Marcelino Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Cabangan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Floridablanca, Pampanga Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Calabgan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Dingalan Community Service Center": ["Project Name 1", "Project Name 2"],
                            }
                        }
                    },
                    {
                        name: "Region 4A",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Quezon Provincial Office": ["Project Name 1", "Project Name 2"]
                            },
                            "Community Service Center": {
                                "Catanauan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Rizal Community Service Center": ["Project Name 1", "Project Name 2"]
                            }
                        }
                    },
                    {
                        name: "Region 4B",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Palawan Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Oriental Mindoro Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Occidental Mindoro Provincial Office ": ["Project Name 1", "Project Name 2"]
                            },
                            "Community Service Center": {
                                "Brookes Point Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Roxas Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Bulalacao Community Service Center": ["Project Name 1", "Project Name 2"],
                                "San Jose Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Sablayan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Odiongan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Sibuyan Community Service Center": ["Project Name 1", "Project Name 2"]
                            }
                        }
                    },
                    {
                        name: "Region 5",
                        structure: {
                            "Regional Office": ["Project Name 11", "Project Name 12"],
                            "Provincial Office": {
                                "Camarines Sur Provincial Office": ["Project Name 11", "Project Name 12"],
                                "Camarines Norte Provincial Office ": ["Project Name 11", "Project Name 12"]
                                
                            },
                            "Community Service Center": {
                                "Buhi Community Service Center": ["Project Name 11"],
                                "Labo Community Service Center": ["Project Name 11"],
                                "Polangui Community Service Center": ["Project Name 11"],
                                "Sorsogon Community Service Center": ["Project Name 11"]
                                
                            }
                        }
                    },
                    {
                        name: "Region 6/7",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Cebu Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Iloilo Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Negros Oriental Provincial Office": ["Project Name 1", "Project Name 2"],
                            },
                            "Community Service Center": {
                                "San Jose Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Tapaz Capiz Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Bacolod City Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Jordan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Tagbiliran Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Guihulngan Community Service Center": ["Project Name 1", "Project Name 2"],
                            }
                        }
                    },
                    {
                        name: "Region 9",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Basilan Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Zamboanga Del Norte Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Zamboanga Del Sur Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Zamboanga Sibugay Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Zamboanga City Provincial Office": ["Project Name 1", "Project Name 2"]
                            },
                            "Community Service Center": {
                                "Lamitan(ARMM) Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Labasan/Liloy Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Sindangan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Piñan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Guipos Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Labangan/Ramon Magsaysay Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Zamboanga City Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Diplahan Community Service Center": ["Project Name 1", "Project Name 2"]
                            }
                        }
                    },
                    {
                        name: "Region 10",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Bukidnon Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Misamis Oriental Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Lanao Del Norte Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Misamis Occidental Provincial Office": ["Project Name 1", "Project Name 2"]
                            },
                            "Community Service Center": {
                                "Manolo Fortich Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Maramag Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Talakag Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Sagay Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Initao Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Rogongon Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Ozamis City Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Gingoog Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Don Victoriano (Calamba) Community Service Centere": ["Project Name 1", "Project Name 2"]
                            }
                        }
                    },
                    {
                        name: "Region 11",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Davao De Oro Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Davao City Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Davao Del Norte Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Davao Del Sur Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Davao Oriental Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Davao Occidental Provincial Office": ["Project Name 1", "Project Name 2"]
                            },
                            "Community Service Center": {
                                "Mabini Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Maragusan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Calinan, Davao City Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Talaingod Community Service Center": ["Project Name 1", "Project Name 2"],
                                "New Corella, Kapalong Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Sta. Maria Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Matanao Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Manay Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Cateel Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Sarangani Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Malalag Community Service Center": ["Project Name 1", "Project Name 2"]
                            }
                        }
                    },
                    {
                        name: "Region 12",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "North Cotabato Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Sultan Kudarat Provincial Office": ["Project Name 1", "Project Name 2"],
                                "South Cotabato Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Sarangani Provincial Office": ["Project Name 1", "Project Name 2"],
                            },
                            "Community Service Center": {
                                "Barongis, Libungan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Columbio Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Kulaman (SNA) Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Lake Sebu Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Tboli Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Polomolok Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Alabel Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Maasim (Maitum) Community Service Center": ["Project Name 1", "Project Name 2"]
                               
                            }
                        }
                    },
                    {
                        name: "Region 13",
                        structure: {
                            "Regional Office": ["Project Name 1", "Project Name 2"],
                            "Provincial Office": {
                                "Agusan Del Norte Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Agusan Del Sur Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Surigao Del Norte Provincial Office": ["Project Name 1", "Project Name 2"],
                                "Surigao Del Sur Provincial Office": ["Project Name 1", "Project Name 2"]
                            },
                            "Community Service Center": {
                                "Santiago Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Las Nieves/Buenavista Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Lamingan, San LuisCommunity Service Center": ["Project Name 1", "Project Name 2"],
                                "La Paz Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Bacuag Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Malimono Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Pakuan, Lanuza/Cantilan Community Service Center": ["Project Name 1", "Project Name 2"],
                                "Rajah Kabungsuan/Bislig Community Service Center": ["Project Name 1", "Project Name 2"]
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