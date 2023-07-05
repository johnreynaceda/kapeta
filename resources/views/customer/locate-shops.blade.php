<x-customer-layout>

    <div class="container relative mx-auto space-y-10 px-4 py-8 lg:space-y-10 lg:px-8 lg:py-5 xl:max-w-7xl">
        <header>
            <span class="font-titan text-xl text-red-600">LOCATE SHOPS</span>
        </header>
        <div>
            <form method="POST">
                <p>
                    <input type="text" name="address" placeholder="Enter address">
                </p>
                <iframe width="100%" height="500"
                    src="https://maps.google.com/maps?q=Davao City, Davao del Sur}&output=embed"></iframe>

            </form>

        </div>
</x-customer-layout>
