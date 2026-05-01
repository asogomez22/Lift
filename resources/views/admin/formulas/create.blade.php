<x-app-layout>
    <x-slot name="header">
        <h2 class="font-heading font-bold text-2xl text-slate-900 leading-tight">
            Añadir Nueva Fórmula
        </h2>
        <p class="text-sm text-slate-500 mt-1">Arrastra campos y operaciones para construir tu fórmula</p>
    </x-slot>

    <div class="max-w-6xl">
        <form action="{{ route('formulas.store') }}" method="POST" id="formulaForm" class="space-y-6">
            @csrf

            <!-- Info básica -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
                <h3 class="text-lg font-bold text-slate-900 mb-4">Información Básica</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nombre *</label>
                        <input type="text" name="name" id="formulaName" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ej: Selección de Grúa">
                        @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Slug * <span class="font-normal text-slate-500">(generado automáticamente)</span></label>
                        <input type="text" name="slug" id="formulaSlug" value="{{ old('slug') }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-slate-50" readonly>
                        @error('slug')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Descripción</label>
                    <textarea name="description" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Explicación de qué calcula esta fórmula">{{ old('description') }}</textarea>
                    @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Categoría *</label>
                        <select name="category" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Seleccionar...</option>
                            <option value="grua">Grúa</option>
                            <option value="viento">Viento</option>
                            <option value="eslinga">Eslinga</option>
                            <option value="volteo">Volteo</option>
                            <option value="suelo">Suelo</option>
                            <option value="otro">Otro</option>
                        </select>
                        @error('category')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Orden</label>
                        <input type="number" name="display_order" value="{{ old('display_order', 0) }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="flex items-end">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-5 h-5 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500">
                            <span class="text-sm font-bold text-slate-700">Activa</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Constructor Visual de Fórmulas -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
                <h3 class="text-lg font-bold text-slate-900 mb-4">Constructor de Fórmula</h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Paleta de elementos -->
                    <div class="lg:col-span-1 space-y-4">
                        <div>
                            <h4 class="text-sm font-bold text-slate-700 mb-3">Variables</h4>
                            <div id="variablesList" class="space-y-2">
                                <!-- Se llenará dinámicamente -->
                            </div>
                            <button type="button" onclick="addVariable()" class="mt-3 w-full inline-flex items-center justify-center gap-2 px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-bold rounded-lg transition">
                                <i class="fa-solid fa-plus"></i> Agregar Variable
                            </button>
                        </div>

                        <div>
                            <h4 class="text-sm font-bold text-slate-700 mb-3">Operaciones</h4>
                            <div class="grid grid-cols-2 gap-2">
                                <button type="button" onclick="addOperation('+')" class="operation-btn">+</button>
                                <button type="button" onclick="addOperation('-')" class="operation-btn">−</button>
                                <button type="button" onclick="addOperation('*')" class="operation-btn">×</button>
                                <button type="button" onclick="addOperation('/')" class="operation-btn">÷</button>
                                <button type="button" onclick="addOperation('^')" class="operation-btn">xⁿ</button>
                                <button type="button" onclick="addOperation('sqrt')" class="operation-btn">√</button>
                                <button type="button" onclick="addOperation('(')" class="operation-btn">(</button>
                                <button type="button" onclick="addOperation(')')" class="operation-btn">)</button>
                            </div>
                        </div>
                    </div>

                    <!-- Área de construcción -->
                    <div class="lg:col-span-2">
                        <div class="bg-slate-50 border-2 border-dashed border-slate-300 rounded-lg p-6 min-h-[300px]">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-sm font-bold text-slate-700">Fórmula</h4>
                                <button type="button" onclick="clearFormula()" class="text-xs text-red-600 hover:text-red-700 font-bold">
                                    <i class="fa-solid fa-trash"></i> Limpiar
                                </button>
                            </div>

                            <div id="formulaBuilder" class="bg-white border border-slate-200 rounded-lg p-4 min-h-[200px] text-2xl font-mono flex flex-wrap items-center gap-2">
                                <!-- Elementos de la fórmula se añadirán aquí -->
                            </div>

                            <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                                <div class="text-xs font-bold text-blue-700 mb-1">Vista Previa</div>
                                <div id="formulaPreview" class="text-lg font-mono text-blue-900">Vacío</div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="formula" id="formulaText" required>
                <input type="hidden" name="parameters" id="parametersJson">
                @error('formula')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <!-- Botones de acción -->
            <div class="flex gap-3">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg shadow-sm transition">
                    <i class="fa-solid fa-save"></i>
                    Guardar Fórmula
                </button>
                <a href="{{ route('formulas.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-lg transition">
                    <i class="fa-solid fa-times"></i>
                    Cancelar
                </a>
            </div>
        </form>
    </div>

    <style>
        .operation-btn {
            @apply px-4 py-3 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold rounded-lg border border-indigo-200 transition cursor-pointer text-lg;
        }
        .formula-element {
            @apply inline-flex items-center gap-1 px-3 py-2 bg-slate-100 border border-slate-300 rounded-lg cursor-move hover:bg-slate-200 transition;
        }
        .formula-variable {
            @apply bg-green-50 border-green-300 text-green-700;
        }
        .formula-operation {
            @apply bg-blue-50 border-blue-300 text-blue-700;
        }
        .variable-item {
            @apply flex items-center gap-2 px-3 py-2 bg-green-50 border border-green-200 rounded-lg cursor-move hover:bg-green-100 transition;
        }
    </style>

    <script>
        let variables = [];
        let formulaElements = [];

        // Auto-generar slug desde nombre
        document.getElementById('formulaName').addEventListener('input', function(e) {
            const slug = e.target.value
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.getElementById('formulaSlug').value = slug;
        });

        function addVariable() {
            const varName = prompt('Nombre de la variable (ej: altura, peso, radio):');
            if (varName && varName.trim()) {
                const varId = varName.trim().toLowerCase().replace(/[^a-z0-9]/g, '_');
                variables.push({ id: varId, name: varName.trim() });
                renderVariables();
                updateParametersJson();
            }
        }

        function renderVariables() {
            const container = document.getElementById('variablesList');
            container.innerHTML = variables.map((v, i) => `
                <div class="variable-item" draggable="true" ondragstart="drag(event, 'var', '${v.id}')">
                    <i class="fa-solid fa-grip-vertical text-slate-400"></i>
                    <span class="flex-1 text-sm font-bold text-slate-700">${v.name}</span>
                    <button type="button" onclick="removeVariable(${i})" class="text-red-600 hover:text-red-700">
                        <i class="fa-solid fa-times text-xs"></i>
                    </button>
                </div>
            `).join('');
        }

        function removeVariable(index) {
            variables.splice(index, 1);
            renderVariables();
            updateParametersJson();
        }

        function drag(event, type, value) {
            event.dataTransfer.setData('type', type);
            event.dataTransfer.setData('value', value);
        }

        function addOperation(op) {
            addToFormula('op', op);
        }

        function addToFormula(type, value) {
            formulaElements.push({ type, value });
            renderFormula();
        }

        // Configurar drop zone
        const builder = document.getElementById('formulaBuilder');
        builder.addEventListener('dragover', (e) => {
            e.preventDefault();
            builder.classList.add('bg-slate-100');
        });

        builder.addEventListener('dragleave', () => {
            builder.classList.remove('bg-slate-100');
        });

        builder.addEventListener('drop', (e) => {
            e.preventDefault();
            builder.classList.remove('bg-slate-100');
            
            const type = e.dataTransfer.getData('type');
            const value = e.dataTransfer.getData('value');
            
            if (type && value) {
                addToFormula(type, value);
            }
        });

        function renderFormula() {
            const builder = document.getElementById('formulaBuilder');
            const preview = document.getElementById('formulaPreview');
            
            if (formulaElements.length === 0) {
                builder.innerHTML = '<span class="text-slate-400 text-base">Arrastra variables y operaciones aquí</span>';
                preview.textContent = 'Vacío';
                document.getElementById('formulaText').value = '';
                return;
            }

            builder.innerHTML = formulaElements.map((el, i) => {
                const isVar = el.type === 'var';
                const varInfo = isVar ? variables.find(v => v.id === el.value) : null;
                const displayValue = isVar ? (varInfo ? varInfo.name : el.value) : el.value;
                
                return `
                    <div class="formula-element ${isVar ? 'formula-variable' : 'formula-operation'}">
                        <span class="font-bold">${displayValue}</span>
                        <button type="button" onclick="removeFormulaElement(${i})" class="ml-1 text-xs opacity-60 hover:opacity-100">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>
                `;
            }).join('');

            // Generar texto de vista previa
            const formulaText = formulaElements.map(el => {
                if (el.type === 'var') return el.value;
                if (el.value === 'sqrt') return '√';
                if (el.value === '*') return '×';
                if (el.value === '/') return '÷';
                if (el.value === '^') return '^';
                return el.value;
            }).join(' ');

            preview.textContent = formulaText || 'Vacío';
            document.getElementById('formulaText').value = formulaText;
        }

        function removeFormulaElement(index) {
            formulaElements.splice(index, 1);
            renderFormula();
        }

        function clearFormula() {
            if (confirm('¿Limpiar la fórmula?')) {
                formulaElements = [];
                renderFormula();
            }
        }

        function updateParametersJson() {
            const params = {
                inputs: variables.map(v => v.id),
                outputs: ['resultado']
            };
            document.getElementById('parametersJson').value = JSON.stringify(params);
        }

        // Validar antes de enviar
        document.getElementById('formulaForm').addEventListener('submit', function(e) {
            if (formulaElements.length === 0) {
                e.preventDefault();
                alert('Debes construir una fórmula antes de guardar');
                return false;
            }
            updateParametersJson();
        });

        // Inicializar
        renderVariables();
        renderFormula();
    </script>
</x-app-layout>
