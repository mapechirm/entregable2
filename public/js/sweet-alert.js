(function () {
    document.querySelectorAll(".form-eliminar").forEach((element) => {
        element.addEventListener("submit", (event) => {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    element.submit();
                }
            });
        });
    });
})();
