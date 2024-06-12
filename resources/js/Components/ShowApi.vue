<template>
    <div>
        <div class="">
            <div class="flex gap-2 justify-center items-center">
                    <select name="" v-model="whatapi" id="">
                        <option value="">Select api</option>
                        <option value="cars">Autod - Minu</option>
                        <option value="lurescape">Kalad</option>
                        <option value="mannicoon">Mätlik</option>
                        <option value="song">Spotify</option>
                    </select>
                    <input
                        type="number"
                        name="limit"
                        id="limit"
                        v-model="limit"
                    />
                    <button @click="fetchdata" class="">Fetch</button>
                </div>
            <div class="grid grid-cols-3 gap-24 items-center py-24">


            <div
                    v-if="whatapi == 'cars'"
                    v-for="data in apiData"
                    :key="data.id"
                >
                    <div>
                        <div class="w-24 h-24">
                        
                        </div>
                        <div>
                            <img class="w-20 h-20" :src="data?.image" alt="">
                            <h1>{{ data?.make }}</h1>
                            <p>{{ data?.model }}</p>
                            <p>{{ data?.year }}</p>
                            <p>{{ data?.color }}</p>
                            <p>{{ data?.milage }}</p>
                            <p>{{ data?.price }}</p>
                            <p>{{ data?.fuelType }}</p>
                            <p>{{ data?.transmission }}</p>
                            <p>{{ data?.engine }}</p>
                            <p>{{ data?.horsepower }}</p>
                            <p>{{ data?.owners }}</p>
                        </div>
                    </div>
                </div>

                <div
                    v-if="whatapi == 'lurescape'"
                    v-for="data in apiData"
                    :key="data.id"
                >
                    <div>
                        <div class="w-24 h-24">
                            <img :src="data?.image_url" :alt="data?.name" />
                        </div>
                        <div>
                            <h1>{{ data?.name }}</h1>
                            <p>{{ data?.description }}</p>
                            <p>{{ data?.is_carnivore }}</p>
                            <p>{{ data?.avg_size }}</p>
                        </div>
                    </div>
                </div>

                <div
                    v-if="whatapi == 'mannicoon'"
                    v-for="data in apiData.cats"
                    :key="data.id"
                >
                    <div>
                        <div>
                            <img class="w-24 h-24" :src="'https://www.mannicoon.com/storage/images/cats/' + data?.image"  :alt="data?.name" />
                        </div>
                        <div>
                            <h1>{{ data?.name }}</h1>
                            <p>{{ data?.birth_date }}</p>
                            <p>{{ data?.color }}</p>
                            <p>{{ data?.category }}</p>
                        </div>
                    </div>
                </div>

                <div
                class=""
                    v-if="whatapi == 'song'"
                    v-for="data in apiData"
                    :key="data.id"
                >
                    <div class="">
                        <div class="w-24 h-24">
                            <img :src="data?.image_url" :alt="data?.name" />
                        </div>

                        <div>
                            <h1 class="text-xl">{{ data?.title }}</h1>
                            <p class="text-lg text-gray-700">{{ data?.artist }}</p>
                            <p class="text-md text-gray-800">{{ data?.uploaded_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            whatapi: '',
            limit: 0,
            apiData: null,
        }
    },
    methods: {
        fetchdata() {
            axios
                .get('/api/api/class', {
                    params: {
                        whatapi: this.whatapi,
                        limit: this.limit,
                    }
                
                })
                .then(response => {
                    console.log(response.data);
                    this.apiData = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>