import { ServicoTO } from './sevico';
export class Cliente {
  constructor(

    public id: number,
    public nome: string,
    public idade: number,
    public servico: ServicoTO,
  ) {}
}
