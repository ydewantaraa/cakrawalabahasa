document.addEventListener("alpine:init", () => {
    Alpine.data("courseApp", () => ({
        activeService: null,
        activeSub: null,
        activeMedia: null,
        courseThumbnail: window.courseThumbnail,
        services: window.servicesData,
        hasTeacher: window.courseHasTeacher,
        pengajar: null,
        quantity: 1,

        getPrice() {
            let price = 0;
            let unitInfo = "";

            if (this.activeService) {
                const service = this.services.find(
                    (s) => s.id === this.activeService,
                );
                if (!service) return "Harga belum tersedia";

                let selectedPrice = null;

                if (this.activeSub) {
                    const sub = service.sub_services.find(
                        (ss) => ss.id === this.activeSub,
                    );
                    if (sub) {
                        selectedPrice =
                            sub.prices.find(
                                (p) => p.learning_type === this.activeMedia,
                            ) ?? null;
                    }
                }

                if (!selectedPrice) {
                    selectedPrice =
                        service.prices.find(
                            (p) => p.learning_type === this.activeMedia,
                        ) ?? null;
                }

                if (selectedPrice) {
                    price = Number(selectedPrice.price);

                    if (selectedPrice.unit_type === "per_item") {
                        price = price * this.quantity;
                    }

                    if (selectedPrice.package_size)
                        unitInfo = ` ${selectedPrice.package_size}`;
                    else if (selectedPrice.unit_type === "per_item") {
                        unitInfo = ` (${this.quantity} item)`;
                    } else if (selectedPrice.unit_type) {
                        unitInfo = ` ${selectedPrice.unit_type}`;
                    }
                }

                return (
                    "Rp " +
                    price.toLocaleString("id-ID", {
                        maximumFractionDigits: 0,
                    }) +
                    unitInfo
                );
            } else {
                const allPrices = [];
                this.services.forEach((service) => {
                    service.prices.forEach((p) => allPrices.push(p));
                    service.sub_services.forEach((sub) =>
                        sub.prices.forEach((p) => allPrices.push(p)),
                    );
                });

                if (allPrices.length > 0) {
                    const cheapest = allPrices.reduce(
                        (min, p) => (p.price < min.price ? p : min),
                        allPrices[0],
                    );
                    price = Number(cheapest.price);
                    if (cheapest.package_size)
                        unitInfo = ` ${cheapest.package_size}`;
                    else if (cheapest.unit_type)
                        unitInfo = ` ${cheapest.unit_type}`;

                    return (
                        "Start from Rp " +
                        price.toLocaleString("id-ID", {
                            maximumFractionDigits: 0,
                        })
                    );
                } else {
                    return "Harga belum tersedia";
                }
            }
        },
        getSelectedPrice() {
            if (!this.activeService) return null;

            const service = this.services.find(
                (s) => String(s.id) === String(this.activeService),
            );
            if (!service) return null;

            let selectedPrice = null;

            if (this.activeSub) {
                const sub = service.sub_services.find(
                    (ss) => String(ss.id) === String(this.activeSub),
                );
                if (sub) {
                    selectedPrice =
                        sub.prices.find(
                            (p) =>
                                p.learning_type?.toLowerCase() ===
                                this.activeMedia?.toLowerCase(),
                        ) ?? null;
                }
            }

            if (!selectedPrice) {
                selectedPrice =
                    service.prices.find(
                        (p) =>
                            p.learning_type?.toLowerCase() ===
                            this.activeMedia?.toLowerCase(),
                    ) ?? null;
            }

            return selectedPrice;
        },
        getTotal() {
            const price = this.getSelectedPrice();
            if (!price) return 0;

            return price.unit_type === "per_item"
                ? price.price * this.quantity
                : price.price;
        },
        getInfoLayanan() {
            const service = this.services.find(
                (s) => s.id === this.activeService,
            );
            return service?.description ?? "";
        },
        getCurrentThumbnail() {
            if (this.activeSub) {
                const service = this.services.find(
                    (s) => s.id === this.activeService,
                );
                const sub = service?.sub_services?.find(
                    (ss) => ss.id === this.activeSub,
                );
                return (
                    sub?.thumbnail || service?.thumbnail || this.courseThumbnail
                );
            }
            if (this.activeService) {
                const service = this.services.find(
                    (s) => s.id === this.activeService,
                );
                return service?.thumbnail || this.courseThumbnail;
            }
            return this.courseThumbnail;
        },
        getAvailableMedia() {
            if (!this.activeService) return [];

            const service = this.services.find(
                (s) => s.id === this.activeService,
            );
            if (!service) return [];

            const mediaSet = new Set();
            service.prices.forEach((p) => {
                if (p.learning_type) mediaSet.add(p.learning_type);
            });
            service.sub_services.forEach((sub) => {
                sub.prices.forEach((p) => {
                    if (p.learning_type) mediaSet.add(p.learning_type);
                });
            });

            return Array.from(mediaSet);
        },
        handleSubmit(event) {
            const service = this.services.find(
                (s) => s.id === this.activeService,
            );

            if (!service) {
                Swal.fire({
                    icon: "warning",
                    title: "Lengkapi Dulu",
                    text: "Pilih layanan terlebih dahulu.",
                    confirmButtonColor: "#f78a28",
                });
                return;
            }

            if (service.sub_services.length > 0 && !this.activeSub) {
                Swal.fire({
                    icon: "warning",
                    title: "Lengkapi Dulu",
                    text: "Pilih sub layanan terlebih dahulu.",
                    confirmButtonColor: "#f78a28",
                });
                return;
            }

            // Cek media hanya jika service punya media
            const hasMedia = service.prices.some((p) => p.learning_type);
            if (hasMedia && !this.activeMedia) {
                Swal.fire({
                    icon: "warning",
                    title: "Lengkapi Dulu",
                    text: "Pilih media terlebih dahulu.",
                    confirmButtonColor: "#f78a28",
                });
                return;
            }

            // Tentukan harga
            let priceObj = null;
            if (this.activeSub) {
                const sub = service.sub_services.find(
                    (ss) => ss.id === this.activeSub,
                );
                priceObj = sub.prices.find(
                    (p) =>
                        p.learning_type?.toLowerCase() ===
                        this.activeMedia?.toLowerCase(),
                );
            }
            if (!priceObj) {
                priceObj = service.prices.find(
                    (p) =>
                        p.learning_type?.toLowerCase() ===
                        this.activeMedia?.toLowerCase(),
                );
            }

            if (!priceObj || priceObj.price <= 0) {
                Swal.fire({
                    icon: "error",
                    title: "Harga Tidak Tersedia",
                    text: "Pilih layanan/sub/media lain.",
                    confirmButtonColor: "#f78a28",
                });
                return;
            }

            this.selectedPrice = priceObj.price;

            // paksa update DOM dulu
            this.$nextTick(() => {
                event.target.submit();
            });
        },
    }));
});
