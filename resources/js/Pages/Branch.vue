<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { MarkerClusterer } from "@googlemaps/markerclusterer";

onMounted(() => {
    const markerclusterer = document.createElement("script")
    markerclusterer.setAttribute("src", "https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js");
    document.head.appendChild(markerclusterer);
    
    const mapsscript = document.createElement("script")
    mapsscript.setAttribute("src", "https://maps.googleapis.com/maps/api/js?key=&callback=initMap&v=weekly");
    mapsscript.setAttribute("defer", "");
    mapsscript.setAttribute("async", "");
    document.head.appendChild(mapsscript);
});
window.initMap = () => {
    const map = new window.google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: { lat: -28.024, lng: 140.887 }
    });

    const infoWindow = new google.maps.InfoWindow({
        content: "",
        disableAutoPan: true,
    });

    const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    const locations = [
  { lat: -31.56391, lng: 147.154312 },
  { lat: -33.718234, lng: 150.363181 },
  { lat: -33.727111, lng: 150.371124 },
  { lat: -33.848588, lng: 151.209834 },
  { lat: -33.851702, lng: 151.216968 },
  { lat: -34.671264, lng: 150.863657 },
  { lat: -35.304724, lng: 148.662905 },
  { lat: -36.817685, lng: 175.699196 },
  { lat: -36.828611, lng: 175.790222 },
  { lat: -37.75, lng: 145.116667 },
  { lat: -37.759859, lng: 145.128708 },
  { lat: -37.765015, lng: 145.133858 },
  { lat: -37.770104, lng: 145.143299 },
  { lat: -37.7737, lng: 145.145187 },
  { lat: -37.774785, lng: 145.137978 },
  { lat: -37.819616, lng: 144.968119 },
  { lat: -38.330766, lng: 144.695692 },
  { lat: -39.927193, lng: 175.053218 },
  { lat: -41.330162, lng: 174.865694 },
  { lat: -42.734358, lng: 147.439506 },
  { lat: -42.734358, lng: 147.501315 },
  { lat: -42.735258, lng: 147.438 },
  { lat: -43.999792, lng: 170.463352 },
];

    const markers = locations.map((position, i) => {
    const label = labels[i % labels.length];
    const marker = new google.maps.Marker({
      position,
      label,
    });

    marker.addListener("click", () => {
      infoWindow.setContent(label);
      infoWindow.open(map, marker);
    });
    return marker;
    });

    new MarkerClusterer({ markers, map });

};

</script>

<template>
    <Head title="Branch" />

    <AuthenticatedLayout>
        <div class="pb-12 pt-[110px]">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <div class="p-4 bg-white">
                                    <p class="mt-1">Sea Rescue area of Responsibility</p>
                                </div>
                                    <div id="map" class="w-full h-[600px]"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
